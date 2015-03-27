<?php

class m_alumnos extends CI_Model {
    
    public function create() {
        $data = array(
            'nombre'  => $this->input->post( 'nombre_alumnotxt', true ),
            'apellido' => $this->input->post( 'apellido_alumnotxt', true ),
            'id_tipo_documento' => 1,
            'nro_documento' => $this->input->post( 'nro_documentotxt', true ),
            'telefono' => $this->input->post( 'celulartxt', true ),
            'correo_electronico' => $this->input->post( 'emailtxt', true ),
            'id_pais' => 1,
            'localidad' => $this->input->post( 'localidadtxt', true ),
            'fecha_naciemiento' => 02-02-2000,
            'id_tipo_alumnos' => 1
            
            
        );
        
        $this->db->insert( 'alumnos', $data );
        return $this->db->insert_id();
    }
    
    public function getById( $id ) {
        $id = intval( $id );
        
        $query = $this->db->where( 'id_alumno', $id )->limit( 1 )->get( 'alumnos' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    
    public function getAll() {
        //get all records from users table
         $vista = 'SELECT alumnos.id_alumno,alumnos.nombre,alumnos.apellido FROM alumnos ';
        $query = $this->db->query($vista);
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    
   
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'alumnos', array( 'id_alumno' => $id ) );
    } //end delete
    
} //end class
