<?php

namespace Classes\Entities;

class Meker
{
  // primary key
  private ?int $maker_id = null;
  // メーカー名
  private ?string $maker_name = "";

  public function setMakerId(int $maker_id): void
  {
    $this->maker_id = $maker_id;
  }
  public function getMakerId(): ?int
  {
    return $this->maker_id;
  }
  public function setMakerName(string $maker_name): void
  {
    $this->maker_name = $maker_name;
  }
  public function getMakerName(): ?string
  {
    return $this->maker_name;
  }
}
