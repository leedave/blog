<?php

namespace Leedch\Blog;

use Leedch\Mysql\Mysql;

/**
 * Basic Model for Blog Entry
 * @author leed
 */
class Entry extends Mysql
{
    protected $id;
    protected $blogId;
    protected $subject;
    protected $content;
    protected $allowComments;
    protected $pinned;
    protected $tags;
    protected $image;
    protected $createdBy;
    protected $createDate;

    protected function getTableName(): string
    {
        return table_blog_entry;
    }

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getBlogId(): int
    {
        return (int) $this->blogId;
    }

    public function setBlogId(int $blogId)
    {
        $this->blogId = $blogId;
    }

    public function getSubject(): string
    {
        return (string) $this->subject;
    }

    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }

    public function getContent(): string
    {
        return (string) $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function getAllowComments(): int
    {
        return (int) $this->allowComments;
    }

    public function setAllowComments(int $allowComments)
    {
        $this->allowComments = $allowComments;
    }

    public function getPinned(): int
    {
        return (int) $this->pinned;
    }

    public function setPinned(int $pinned)
    {
        $this->pinned = $pinned;
    }

    public function getTags(): array
    {
        return (array) json_decode((string) $this->tags, true);
    }

    public function setTags(array $tags)
    {
        foreach ($tags as $key => $val) {
            if ($val === "") {
                unset($tags[$key]);
            }
        }
        $this->tags = json_encode($tags, JSON_UNESCAPED_UNICODE);
    }

    public function getImage(): string
    {
        return (string) $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getCreatedBy(): int
    {
        return (int) $this->createdBy;
    }

    public function setCreatedBy(int $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function getCreateDate(): string
    {
        return (string) $this->createDate;
    }

    public function setCreateDate(string $createDate)
    {
        $this->createDate = $createDate;
    }
}
