<?php

namespace App\Component\Post\Infrastructure\Db;

use App\Component\Post\Domain\Repository\PostRepository;
use App\Component\Post\Domain\Post;
use App\Component\Post\Domain\ValueObject\PostContent;
use App\Component\Post\Domain\ValueObject\PostId;
use App\Component\Post\Domain\ValueObject\PostLink;
use App\Component\Post\Domain\ValueObject\PostTitle;
use App\Component\Post\Infrastructure\Exception\PostSaveException;
use App\Presentation\UI\Web\Frontend\Models\User;
use App\Shared\Infrastructure\Db\Eloquent;
use App\Component\Tag\Domain\Tag;
use Exception;

final class DbPostRepository implements PostRepository
{
    public function __construct(private Eloquent $db)
    {
    }

    // TODO
    public function findBy(PostId $postId): Post
    {
        $data = $this->db
            ->table('post')
            ->leftJoin('tags', '', '') // TODO
            ->join('user', '', '') // TODO
            ->where('uuid', $postId)
            ->first();

        return new Post(
            new PostId($data['uuid']),
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
            $this->db->beginTransaction();

            $data = $post->toSnapshot();
            $this->db
                ->table('post')
                ->insert([
                    'uuid' => $data['uuid'],
                    'title' => $data['title'],
                    'link' => $data['link'],
                    'content' => $data['content'],
                ]);

            /** @var Tag $tag */
            foreach ($data['tags'] as $tag) {
                $tagData = $tag->toSnapshot();

                $this->db
                    ->table('tag')
                    ->insert([
                        'uuid' => $tagData['uuid'],
                        'value' => $tagData['value'],
                    ]);
            }

            $this->db->commit();
        } catch (Exception $ex) {
            $this->db->rollBack();
            throw new PostSaveException($ex->getMessage());
        }
    }

    public function remove(Post $post): void
    {
        $this->db
            ->table('post')
            ->where('uuid', $post->id())
            ->delete();
    }
}
