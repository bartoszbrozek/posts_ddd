<?php

namespace App\Component\Post\Infrastructure\Db;

use App\Component\Post\Application\Query\DTO\PostHydrator;
use App\Component\Post\Domain\Repository\PostRepository;
use App\Component\Post\Domain\Post;
use App\Component\Post\Domain\ValueObject\PostContent;
use App\Component\Post\Domain\ValueObject\PostId;
use App\Component\Post\Domain\ValueObject\PostLink;
use App\Component\Post\Domain\ValueObject\PostTitle;
use App\Component\Post\Infrastructure\Exception\PostSaveException;
use App\Component\Post\Infrastructure\PostCollection;
use App\Component\Tag\Domain\Tag;
use App\Component\Tag\Domain\ValueObject\TagId;
use App\Component\Tag\Domain\ValueObject\TagValue;
use App\Shared\Infrastructure\Auth\User as AuthUser;
use App\Shared\Infrastructure\Db\DbConnection;
use DateTimeImmutable;
use Exception;

final class DbPostRepository implements PostRepository
{
    private const TABLE = 'posts';

    public function __construct(
        private DbConnection $db,
        private PostHydrator $postHydrator,
    ) {
    }

    public function findAll(): PostCollection
    {
        $items = $this->db->connection()
            ->table(self::TABLE)
            ->join('users AS u', 'u.id', '=', self::TABLE . '.user_id')
            ->get([
                self::TABLE . '.id',
                self::TABLE . '.title',
                self::TABLE . '.link',
                self::TABLE . '.content',
                self::TABLE . '.created_at',
                self::TABLE . '.updated_at',
                'u.name AS user_name',
            ]);

        $collection = new PostCollection();

        foreach ($items as $item) {
            $collection->add(
                $this->postHydrator->hydrate((array)$item),
            );
        }

        return $collection;
    }

    private function findTagsByPostId(PostId $postId): array
    {
        $tags = [];
        $tagsData = $this->db->connection()
            ->table('tag')
            ->join('post_tag AS pt', 'pt.tag_id', '=', 'tag.id')
            ->where('pt.post_id', $postId->uuid())
            ->get([
                'tag.id',
                'tag.value',
            ]);

        foreach ($tagsData as $tag) {
            $tags[$tag->id] = Tag::create(new TagId($tag->id), new TagValue($tag->value));
        }

        return $tags;
    }

    public function findBy(PostId $postId): Post
    {
        $data = $this->db->connection()
            ->table(self::TABLE)
            ->join('users AS u', 'u.id', '=', self::TABLE . '.user_id')
            ->first([
                self::TABLE . '.id',
                self::TABLE . '.title',
                self::TABLE . '.link',
                self::TABLE . '.content',
                self::TABLE . '.created_at',
                self::TABLE . '.updated_at',
                'u.id AS user_id',
                'u.name AS user_name',
                'u.email AS user_email',
            ]);


        $tags = $this->findTagsByPostId(new PostId($data->id));

        return new Post(
            new PostId($data->id),
            new PostTitle($data->title),
            new PostLink($data->link),
            new PostContent($data->content),
            new DateTimeImmutable($data->created_at),
            new DateTimeImmutable($data->updated_at),
            $tags,
            new AuthUser([
                'id' => $data->user_id,
                'name' => $data->user_name,
                'email' => $data->user_email,
            ]),
        );
    }

    public function save(Post $post): void
    {
        try {
            $this->db->connection()->beginTransaction();

            $postData = $post->toSnapshot();
            $this->db->connection()
                ->table(self::TABLE)
                ->updateOrInsert(
                    [
                        'id' => $postData['id']->uuid(),
                        'user_id' => $postData['user']->id,
                    ],
                    [
                        'title' => $postData['title']->value(),
                        'link' => $postData['link']->value(),
                        'content' => $postData['content']->value(),
                        'created_at' => $postData['createdAt'],
                        'updated_at' => $postData['updatedAt'],
                    ]
                );

            $this->db->connection()
                ->table('post_tag')
                ->select()
                ->where('post_id', $postData['id']->uuid())
                ->delete();

            // /** @var Tag $tag */
            foreach ($postData['tags'] as $tag) {
                $tagData = $tag->toSnapshot();

                $this->db->connection()
                    ->table('tag')
                    ->insertOrIgnore([
                        'id' => $tagData['id']->uuid(),
                        'value' => $tagData['tagValue']->value(),
                    ]);

                $this->db->connection()
                    ->table('post_tag')
                    ->insert([
                        'post_id' => $postData['id']->uuid(),
                        'tag_id' => $tagData['id']->uuid(),
                    ]);
            }

            $this->db->connection()->commit();
        } catch (Exception $ex) {
            $this->db->connection()->rollBack();
            throw new PostSaveException($ex->getMessage());
        }
    }

    public function remove(Post $post): void
    {
        $this->db->connection()
            ->table(self::TABLE)
            ->where('uuid', $post->id())
            ->delete();
    }
}
