<?php
session_start();
class Bebida {
   public function mostrarBebida() {
       throw new Exception("Método abstrato deve ser implementado.");
   }
   public function verificarPreco($preco) {
       throw new Exception("Método abstrato deve ser implementado.");
   }
}
class Vinho extends Bebida {
   private $nome;
   private $ano;
   private $preco;
   public function __construct($nome, $ano, $preco) {
       $this->nome = $nome;
       $this->ano = $ano;
       $this->preco = $preco;
   }
   public function mostrarBebida() {
       return "Vinho: {$this->nome}, Ano: {$this->ano}, Preço: R$" . number_format($this->preco, 2);
   }
   public function verificarPreco($preco) {
       return $preco < 25;
   }
}
class Refrigerante extends Bebida {
   private $nome;
   private $marca;
   private $preco;
   public function __construct($nome, $marca, $preco) {
       $this->nome = $nome;
       $this->marca = $marca;
       $this->preco = $preco;
   }
   public function mostrarBebida() {
       return "Refrigerante: {$this->nome}, Marca: {$this->marca}, Preço: R$" . number_format($this->preco, 2);
   }
   public function verificarPreco($preco) {
       return $preco < 5;
   }
}
class Suco extends Bebida {
   private $nome;
   private $tipo;
   private $preco;
   public function __construct($nome, $tipo, $preco) {
       $this->nome = $nome;
       $this->tipo = $tipo;
       $this->preco = $preco;
   }
   public function mostrarBebida() {
       return "Suco: {$this->nome}, Tipo: {$this->tipo}, Preço: R$" . number_format($this->preco, 2);
   }
   public function verificarPreco($preco) {
       return $preco < 2.5;
   }
}
if (!isset($_SESSION['bebidas'])) {
   $_SESSION['bebidas'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['tipo'])) {
       switch ($_POST['tipo']) {
           case 'vinho':
               $vinho = new Vinho($_POST['nome'], $_POST['ano'], $_POST['preco']);
               $_SESSION['bebidas'][] = $vinho;
               break;
           case 'refrigerante':
               $refrigerante = new Refrigerante($_POST['nome'], $_POST['marca'], $_POST['preco']);
               $_SESSION['bebidas'][] = $refrigerante;
               break;
           case 'suco':
               $suco = new Suco($_POST['nome'], $_POST['tipo'], $_POST['preco']);
               $_SESSION['bebidas'][] = $suco;
               break;
       }
   }
}
?>