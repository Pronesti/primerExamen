<?php

class Battleship{
    private $tableroJugador1;
    private $tableroJugador2;
    private $disparosJugador1;
    private $disparosJugar2;
    private $navesJugador1;
    private $navesJugador2;
    private $turno = 1;

    public function __construct($filas, $columnas, $naves){
        $this->navesJugador1 = $naves;
        $this->navesJugador2 = $naves;
        $tablero_vacio = array();
        foreach(range(0,$filas) as $i => $vi){
            $tablero_vacio[] = array($columnas);
            foreach(range(0,$columnas) as $j => $vj){
                $tablero_vacio[$i][$j] = 0;
            }
        }
        $this->tableroJugador1 = $tablero_vacio;
        $this->tableroJugador2 = $tablero_vacio;
        $this->disparosJugador1 = $tablero_vacio;
        $this->disparosJugador2 = $tablero_vacio;
    }

    function mostrarTablero($jugador){
        if($jugador == 1){
            return $this->tableroJugador1;
        }else{
            return $this->tableroJugador2;
        }
    }

    function colocarNave($jugador, $fila, $columna){
        if($jugador == 1){
            if($this->tableroJugador1[$fila][$columna] == 0 && $this->navesJugador1 > 0){
                $this->navesJugador1 = $this->navesJugador1 - 1;
                $this->tableroJugador1[$fila][$columna] = 1;
            }
        }else{
            if($this->tableroJugador2[$fila][$columna] == 0 && $this->navesJugador2 > 0){
                $this->navesJugador2 = $this->navesJugador2 - 1;
                $this->tableroJugador2[$fila][$columna] = 1;
            }
        }
        return $this->mostrarTablero($jugador);
    }

    function disparar($fila, $columna){
        $jugador = $this->turno;
        if($jugador == 1){
            if($this->tableroJugador2[$fila][$columna] == 1){
                $this->tableroJugador2[$fila][$columna] = 2;
                $this->disparosJugador1[$fila][$columna] = 2;
            }else{//no hay un barco ahi
                $this->disparosJugador1[$fila][$columna] = 9;
            }
            $this->turno = 2;
            return $this->disparosJugador1;
        }else{
            if($this->tableroJugador1[$fila][$columna] == 1){
                $this->tableroJugador1[$fila][$columna] = 2;
                $this->disparosJugador2[$fila][$columna] = 2;
            }else{//no hay un barco ahi
                $this->disparosJugador2[$fila][$columna] = 9;
            }
            $this->turno = 1;
            return $this->disparosJugador2;
        }
    }

    function comprobarGanador($jugador){
        if($jugador == 1){
            $tabJugador2 = $this->mostrarTablero(2);
            foreach($tabJugador2 as $i => $v_i){
                foreach($tabJugador2[$i] as $j => $v_j){
                    if ($v_j == 1){
                        return false;
                    }
                }
            }
        }else{
            $tabJugador1 = $this->mostrarTablero(1);
            foreach($tabJugador1 as $i => $v_i){
                foreach($tabJugador1[$i] as $j => $v_j){
                    if ($v_j == 1){
                        return false;
                    }
                }
            }
        }
        return true;
    }

    function terminoElJuego(){
        return ($this->comprobarGanador(1) || $this->comprobarGanador(2));
    }

    function cuantosTurnosPasaron(){
        $jugador1 = 0;
        $jugador2 = 0;
        foreach($this->disparosJugador1 as $i => $v_i){
            foreach($this->disparosJugador1[$i] as $j => $v_j){
                if ($v_j == 2 || $v_j == 9){
                    $jugador1 = $jugador1 + 1;
                }
            }
        }
        foreach($this->disparosJugador2 as $i => $v_i){
            foreach($this->disparosJugador2[$i] as $j => $v_j){
                if ($v_j == 2 || $v_j == 9){
                    $jugador2 = $jugador2 + 1;
                }
            }
        }
        return ($jugador1+$jugador2);
    }
}