<?php

namespace Luccui\Classes;

use RecursiveIterator;

class CayDanhMuc implements RecursiveIterator
{
    private $currentIndex = 0;
    private int $id;
    private string $tenDanhMuc;
    private array $danhmucs = [];
    private array $danhMucCon = [];

    public function __construct($id, $tenDanhMuc)
    {
        $this->id = $id;
        $this->tenDanhMuc = $tenDanhMuc;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTenDanhMuc(): ?string
    {
        return $this->tenDanhMuc;
    }

    public function current()
    {
        return $this->danhmucs[$this->currentIndex];
    }

    public function next()
    {
        $this->currentIndex++;
    }

    public function key()
    {
        return $this->currentIndex;
    }

    public function valid()
    {
        return isset($this->danhmucs[$this->currentIndex]);
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }
    public function exists(CayDanhMuc $cayDanhMuc)
    {
        return array_search($cayDanhMuc->getId(), array_keys($this->danhmucs));

    }
    public function hasChildren()
    {
        return count($this->danhMucCon);
    }

    public function getChildren(): array
    {
        return $this->danhMucCon;
    }
    public function themDanhMucCon($danhMucCon)
    {
        $this->danhMucCon[] = $danhMucCon;
    }
    public function themDanhMuc(CayDanhMuc $danhmuc) {
        $this->danhmucs[$danhmuc->getId()] = $danhmuc;
    }
    public function getDanhmucs(): array
    {
        return $this->danhmucs;
    }
}
