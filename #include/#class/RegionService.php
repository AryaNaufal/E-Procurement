<?php

namespace App;

class RegionService
{
  private $db;

  public function __construct()
  {
    $this->db = new DB(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }

  public function getProvinces()
  {
    $sql = "SELECT * FROM reg_provinces";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function getRegencies($province_id)
  {
    $sql = "SELECT * FROM reg_regencies WHERE province_id = :province_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':province_id', $province_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function getDistricts($regency_id)
  {
    $sql = "SELECT * FROM reg_districts WHERE regency_id = :regency_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':regency_id', $regency_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function getVillages($district_id)
  {
    $sql = "SELECT * FROM reg_villages WHERE district_id = :district_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':district_id', $district_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function getRegionName($id)
  {
    $sql = "SELECT name FROM reg_villages WHERE id = :id UNION SELECT name FROM reg_districts WHERE id = :id UNION SELECT name FROM reg_regencies WHERE id = :id UNION SELECT name FROM reg_provinces WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch()['name'];
  }
}
