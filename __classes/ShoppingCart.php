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
    

    public function changeQuantity($nom, $qte){
        $nb_articles = count($_SESSION['panier']['nom']);

        for($i = 0; $i < $nb_articles; $i++)
        {
        if($nom == $_SESSION['panier']['nom'][$i])
        {
            $_SESSION['panier']['quantite'][$i] = $qte;
        }
    }
}

    public function removeFromCart($nom){
        //panier temporaire
        $panier_tmp = array("nom"=>array(),"quantite"=>array(),"prix"=>array());
        //on compte le nombre d'article
        $nb_articles = count($_SESSION['panier']['nom']);
        
        for($i = 0; $i < $nb_articles; $i++)
        {
            if($_SESSION['panier']['nom'][$i] != $nom)
             {
            array_push($panier_tmp['nom'],$_SESSION['panier']['nom'][$i]);
            array_push($panier_tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
            array_push($panier_tmp['prix'],$_SESSION['panier']['prix'][$i]);
            }
        }
            

            $_SESSION['panier'] = $panier_tmp;
            /* Option : on peut maintenant supprimer notre panier temporaire: */
            unset($panier_tmp);

        }

        public function clearCart(){

            unset($_SESSION['panier']);
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
    
    if(isset($_SESSION['panier'])){
        $nb_articles = count($_SESSION['panier']['nom']);
    
        for($i = 0; $i < $nb_articles; $i++)
        {
            $montant += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
        }
    }else{
        $nb_articles = 0;
    }
    
    return $montant;
    }
}