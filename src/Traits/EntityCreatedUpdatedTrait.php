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
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}