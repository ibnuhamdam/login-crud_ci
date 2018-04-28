<?php 
defined('BASEPATH') or exit('No direct script access allowed');
/**
* 
*/
class Web extends CI_Model
{

	public function get_data()
	{
		$query = $this->db->order_by('nama','DESC')->get('mahasiswa');
		return $query->result();
	}

	public function save_data($data)
	{
		$param = array(
					"nim"=>$data['nim'],
					"nama"=>$data['nama'],
					"telepon"=>$data['telepon'],
					"email"=>$data['email'],
					"jurusan"=>$data['jurusan'],
		);
		$insert = $this->db->insert('mahasiswa', $param);
        if ($insert){
            return TRUE;
        }else{
            return FALSE;
        }
	}

    public function edit_data($data){
	    $table = 'mahasiswa';
        $param = array(
            "nim"=>$data['nim'],
            "nama"=>$data['nama'],
            "telepon"=>$data['telepon'],
            "email"=>$data['email'],
            "jurusan"=>$data['jurusan'],
        );
        $this->db->where('nim', $data['nim']);
        $update = $this->db->update($table,$param);
        //5.lengkapi ini dengan memanggil fungsi UPDATE
        if ($update){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function delete_data($nim){
        $table = 'mahasiswa';
        $this->db->where('nim', $nim);
        $delete = $update = $this->db->delete($table);
        //6.lengkapi ini dengan memanggil fungsi DELETE

        if ($delete){
            return TRUE;
        }else{
            return FALSE;
        }

    }
}

?>