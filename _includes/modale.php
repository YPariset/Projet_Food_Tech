 <!-- modale window -->
 <div class="modal fade" id="detail" tabindex="-1" aria-hidden="true" >
     <div class="modal-dialog">
           <div class="modal-content" style="width:1000px;min-height:500px;margin-left:-250px;">
               <div class="modal-body" style="padding:0;">
                     <div class="container-fluid" style="padding:0;">
                         <div class="flexModal" >
                              <div class="colModal imgModal">

                               <img src="_assets/image/photo_bouffe.jpg" height="600" styl="max-width:100%;height:auto;">
                              </div>
                              <div class="colModal textModal">
                                   <div class="contenTextModal">
                                        <h5>Le nome du plat</h5>
                                        <p>La description du plat blblbla bla la description c est cool
                                             ljnodmq ljhljg mlkp ji khlhlhojh ljh
                                        </p>
                                        <br>
                             <!-- si il n'y a pas de product a custom, on affiche des instructions -->
                                        <p><strong>SPECIAL INSTRUCTIONS</p>
                                        <hr>
                                         <input class="inputModal" type="text" placeholder="Add instructions...">
                                        <hr>
                                        <br>
                            <!--  sinon on affiche les produits à custom -->
                                        <p>Allergens : Gluten</p>
                                        <p>Calories : 243cal</p>
                                        <p>Origin : France</p>
                                        <br>
                                        <form method="POST" action="">
                                        <div  class="btn btn-secondary" style="border-radius:40px;background-color:#3cb6c9;border:none;margin-right:15px;">
                                             <span class="bAdd button1">-</span>
                                             <input type="texte" class="quantityItem" name="qteCart" value="1" min="1" contenteditable="false" style="border:none;outline:none;background-color:#3cb6c9;color:white;width:10px;"></input>
                                             <span class="bAdd button2">+</span>
                                        </div>

                                        <button type="submit" name="cartButton" class="btn btn-secondary buttonCart" style="border-radius:40px;background-color:#3cb6c9;border:none;">
                                             Add to cart<span class="totalItem">$23</span>
                                        </button>
                                        </form>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

</div>
<!-- end modale window -->