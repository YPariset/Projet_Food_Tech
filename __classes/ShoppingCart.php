<?php
class Shoppingcart{

    /*
    * création d'une session d'achat
    *
    * 
    *
    * @return void
    */
    function createCart(){
        if (!isset($_SESSION['panier'])){
           $_SESSION['panier'] = array();

           $_SESSION['panier']['nom'] = array();
           $_SESSION['panier']['quantite'] = array();
           $_SESSION['panier']['prix'] = array();
        }
     }

     /*
    * ajoute des produits à la session panier
    *
    * @param string $nom, string $quantity, float $prix
    *
    *  
    */
    public function addToCart( $nom,  $quantity,  $prix){
        if(isset($_SESSION['panier'])){
            $position = in_array($nom, $_SESSION['panier']['nom']);
            if(!$position){
                array_push( $_SESSION['panier']['nom'],$nom);
                array_push( $_SESSION['panier']['quantite'],$quantity);
                array_push( $_SESSION['panier']['prix'],$prix);
            }else{
                $_SESSION['panier']['quantite'][$position] += $quantity;  
                $_SESSION['panier']['prix'][$position] += $quantity * $prix; 
            }
        }
    }
    
    /*
    * modifie la quantite d'un produit du panier
    *
    * @param string $nom, int quantite
    *
    * @return int 
    */
    public function changeQuantity($nom, $qte){
        $nb_articles = count($_SESSION['panier']['nom']);

        for($i = 0; $i < $nb_articles; $i++)
        {
        if($nom == $_SESSION['panier']['nom'][$i])
        {
            $_SESSION['panier']['qte'][$i] = $qte;
        }
        return $qte;
    }
}

    /*
    * calcule le montant du panier
    *
    *
    * @return float
    */
function montant_panier()
{
    $montant = 0;
    
    $nb_articles = count($_SESSION['panier']['nom']);
   
    for($i = 0; $i < $nb_articles; $i++)
    {
        $montant += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
    }
    
    return $montant;
}
}