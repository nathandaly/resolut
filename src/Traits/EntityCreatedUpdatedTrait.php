<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;

trait EntityCreatedUpdatedTrait
{
    /**
     * @ORM\Column(type="datetime", name="created_date")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", name="modified_date")
     */
    private $updatedAt;

    /**
     * Set createdAt.
     * @param \DateTimeInterface $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     * @param \DateTimeInterface $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
}