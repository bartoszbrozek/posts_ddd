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
use App\Presentation\UI\Web\Frontend\Models\User;
use App\Component\Tag\Domain\Tag;
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

    // TODO
    public function findBy(PostId $postId): Post
    {
        $data = $this->db->connection()
            ->table(self::TABLE)
            ->leftJoin('tags', '', '') // TODO
            ->join('user', '', '') // TODO
            ->where('uuid', $postId)
            ->first();

        return new Post(
            new PostId($data['id']),
            new PostTitle($data['title']),
            new PostLink($data['link']),
            new PostContent($data['content']),
            $data['tags'],
            new User($data['user']),
        );
    }

    public function save(Post $post): void
    {
        try {
            $this->db->connection()->beginTransaction();

            $data = $post->toSnapshot();
            $this->db->connection()
                ->table(self::TABLE)
                ->insert([
                    'id' => $data['id']->uuid(),
                    'title' => $data['postTitle']->value(),
                    'link' => $data['postLink']->value(),
                    'content' => $data['postContent']->value(),
                    'user_id' => $data['user']->id,
                    'created_at' => new DateTimeImmutable(),
                ]);

            // /** @var Tag $tag */
            // foreach ($data['tags'] as $tag) {
            //     $tagData = $tag->toSnapshot();

            //     $this->db->connection()
            //         ->table('tag')
            //         ->insert([
            //             'id' => $tagData['id'],
            //             'value' => $tagData['value'],
            //         ]);
            // }

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
