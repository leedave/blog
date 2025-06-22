<?php

namespace Leedch\Blog\Blog\Entry;

use Leedch\Blog\Blog\Entry;
use Leedch\Filehandler\Image as ParentImage;

/**
 * Rezept Image Class
 * @author leed
 */
class Image extends ParentImage
{
    private $entry;

    public function __construct(Entry &$entry)
    {
        $this->entry = $entry;
    }

    public function initFile()
    {
        $baseDir = __DIR__ . "/../../../uploads";
        $this->storageDirectory = $baseDir . "/blog/" . $this->entry->getId();
        $this->webFolder = $baseDir . "/../web/data/img/blog/" . $this->entry->getId();
        $this->adminFolder = $baseDir . "/../admin/data/img/blog/" . $this->entry->getId();
        $this->webPath = "data/img/blog/" . $this->entry->getId();
        $this->adminWebPath = "/data/img/blog/" . $this->entry->getId();
        $this->createItemFolders();
    }

    protected function getWebImagePreview(string $fileName) : string
    {
        $this->setDimensionsWebPreview();
        return $this->getImageVariant($fileName, "prev-".$fileName, $this->webFolder);
    }
    protected function getWebImageDetail(string $fileName) : string
    {
        $this->setDimensionsWebDetail();
        return $this->getImageVariant($fileName, $fileName, $this->webFolder);
    }

    protected function setDimensionsAdminDetail()
    {
        $this->width = blog_entryImg_admin_width;
        $this->height = blog_entryImg_admin_height;
    }

    protected function setDimensionsAdminPreview()
    {
        $this->width = blog_entryImgPrev_admin_width;
        $this->height = blog_entryImgPrev_admin_height;
    }

    protected function setDimensionsWebPreview()
    {
        $this->width = blog_entryImgPrev_web_width;
        $this->height = blog_entryImgPrev_web_height;
    }

    protected function setDimensionsWebDetail()
    {
        $this->width = blog_entryImg_web_width;
        $this->height = blog_entryImg_web_height;
    }

    protected function getImageVariant(string $originalFileName, string $variantFileName, string $targetFolder) : string
    {
        if ($originalFileName === "" || $variantFileName === "") {
            return $this->returnDefaultImg($targetFolder, $variantFileName);
        }
        if (file_exists($targetFolder . "/" . $variantFileName)) {
            return $variantFileName;
        }
        if (!file_exists($this->storageDirectory . "/" . $originalFileName)) {
            return $this->returnDefaultImg($targetFolder, $variantFileName);
        }
        $imageSrc = $this->cropImage($this->storageDirectory . "/" . $originalFileName, $targetFolder . "/" . $variantFileName);
        return $imageSrc;
    }

    protected function returnDefaultImg(string $targetFolder, string $variantFileName): string
    {
        $defaultImg = blog_defaultImg;
        $arrFileName = explode("/", $defaultImg);
        $variantFileName .= array_pop($arrFileName);
        $imageSrc = $this->cropImage($defaultImg, $targetFolder . "/" . $variantFileName);
        return $imageSrc;
    }

    public function getWebImagePreviewWeb(string $fileName) : string
    {
        $pathLocal = $this->getWebImagePreview($fileName);
        return static::replaceFilePath($pathLocal, $this->webPath);
    }

    public function getWebImageDetailWeb(string $fileName) : string
    {
        $pathLocal = $this->getWebImageDetail($fileName);
        return static::replaceFilePath($pathLocal, $this->webPath);
    }
}
