<?php

namespace Leedch\Blog;

use Leedch\Mysql\Mysql;

/**
 * Basic Model for Blog Category
 * @author leed
 */
class Blog extends Mysql
{
    protected $id;
    protected $name;
    protected $description;
    protected $ownerId;
    protected $createDate;

    protected function getTableName(): string
    {
        return table_blog;
    }

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return (string) $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return (string) $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getOwnerId(): int
    {
        return (int) $this->ownerId;
    }

    public function setOwnerId(int $ownerId)
    {
        $this->ownerId = $ownerId;
    }

    public function getCreateDate(): string
    {
        return (string) $this->createDate;
    }

    public function setCreateDate(string $createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * Override this class to make sure you have the env version of Entry when
     * using commands like loadEntries
     * @return Entry
     */
    protected function getEntryClass(): Entry
    {
        $response = new Entry();
        return $response;
    }

    protected function getEntryObj(): Entry
    {
        return new Entry();
    }

    protected function loadEntries(): array
    {
        $col = $this->getEntryClass();
        $rows = $col->loadByPrepStmt(['*'], ["blogId" => $this->id], ['`pinned` DESC', '`id` DESC'], [100]);
        $response = [];
        foreach ($rows as $row) {
            $entry = $this->getEntryObj();
            $entry->loadWithData($row);
            $response[] = $entry;
        }
        return $response;
    }
}
