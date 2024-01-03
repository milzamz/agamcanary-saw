<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_m extends CI_Model {
    
    public function get()
    {
        $this->db->select('a.kenari_id, c.nama_kenari, c.jenis_kelamin, sum(if(a.id_kriteria=1,IF(b.sifat=1, a.nilai/(SELECT max(nilai) FROM bobot_kriteria WHERE id_kriteria = 1),(SELECT min(nilai) FROM bobot_kriteria WHERE id_kriteria = 1)/a.nilai), 0)) as C1, sum(if(a.id_kriteria=2,IF(b.sifat=1, a.nilai/(SELECT max(nilai) FROM bobot_kriteria WHERE id_kriteria = 2),(SELECT min(nilai) FROM bobot_kriteria WHERE id_kriteria = 2)/a.nilai), 0)) as C2, sum(if(a.id_kriteria=3,IF(b.sifat=1, a.nilai/(SELECT max(nilai) FROM bobot_kriteria WHERE id_kriteria = 3),(SELECT min(nilai) FROM bobot_kriteria WHERE id_kriteria = 3)/a.nilai), 0)) as C3, sum(if(a.id_kriteria=4,IF(b.sifat=1, a.nilai/(SELECT max(nilai) FROM bobot_kriteria WHERE id_kriteria = 4),(SELECT min(nilai) FROM bobot_kriteria WHERE id_kriteria = 4)/a.nilai), 0)) as C4 from bobot_kriteria a JOIN kriteria b USING(id_kriteria) JOIN kenari c using(kenari_id) GROUP BY a.kenari_id ORDER BY a.kenari_id DESC;');
        $query = $this->db->get();
        return $query;
    }


    public function norm()
    {
        $this->db->query("CREATE TABLE normalisasi SELECT a.kenari_id, c.nama_kenari, sum(if(a.id_kriteria=1,IF(b.sifat=1, a.nilai/(SELECT max(nilai) FROM bobot_kriteria WHERE id_kriteria = 1),(SELECT min(nilai) FROM bobot_kriteria WHERE id_kriteria = 1)/a.nilai), 0)) as C1, sum(if(a.id_kriteria=2,IF(b.sifat=1, a.nilai/(SELECT max(nilai) FROM bobot_kriteria WHERE id_kriteria = 2),(SELECT min(nilai) FROM bobot_kriteria WHERE id_kriteria = 2)/a.nilai), 0)) as C2, sum(if(a.id_kriteria=3,IF(b.sifat=1, a.nilai/(SELECT max(nilai) FROM bobot_kriteria WHERE id_kriteria = 3),(SELECT min(nilai) FROM bobot_kriteria WHERE id_kriteria = 3)/a.nilai), 0)) as C3, sum(if(a.id_kriteria=4,IF(b.sifat=1, a.nilai/(SELECT max(nilai) FROM bobot_kriteria WHERE id_kriteria = 4),(SELECT min(nilai) FROM bobot_kriteria WHERE id_kriteria = 4)/a.nilai), 0)) as C4 from bobot_kriteria a JOIN kriteria b USING(id_kriteria) JOIN kenari c using(kenari_id) GROUP BY a.kenari_id ORDER BY a.kenari_id;");
    }

    public function clear()
    {
        $this->db->truncate('hasil');
    }

    public function lap()
    {
        return $this->db->query("SELECT * FROM hasil left JOIN kenari USING(kenari_id) GROUP BY hasil.id_hasil ORDER BY hasil.created desc")->result_array();
    }
    
    public function show($request)
    {
        $this->db->select('*');
        $this->db->from('hasil');
        $this->db->where('month(created)', $request);
        $query = $this->db->get();
        return $query;
    }

}  
