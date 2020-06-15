  // FONCTION qui permet de generer des inputs
  //var for recp ask's type
  var type = 0 ;
//  var indice = 0 ;
var nbr = 0 ;
 function genere(){
   nbr++ ; 
//    indice++ ;
        // recup de l'id select
         var choix = document.getElementById("choix").value  ; 
        //divinputs est le div parent
          var divinputs = document.getElementById("inputs");
          //nous crreeons un div
          var newinput  = document.createElement("div"); 
          //on veut agreger a notre div les attributs suivants
          newinput.setAttribute('class','simple' ) ;  
          newinput.setAttribute('name','same') ;           
            // newinput.setAttribute("type","text");
           newinput.setAttribute("id","reponse_"+nbr); 
          
             if(choix === "simple"){
                 var nb = 0 ;   
                 //pour desactiver le bouton    
                document.getElementById("btn-first").disabled = false;
                          newinput.innerHTML = `
                <input type="text" name="reponse${nbr}" id="reponse${nbr}" class="new" >
                <input type="radio" value="${nbr}" name="exacte" class="radio">
                <button type="button" class="new_btn" onclick= "sup(${nbr})">X</button>                      
           `;   
            } else if(choix === "multiple"){
                document.getElementById("btn-first").disabled = false;
                newinput.innerHTML = ` 
                <input type="text" name="reponse${nbr}" class="new">
                <input type="checkbox" value="${nbr}" name="exacte${nbr}" class="check" >
                <button type="button" class="new_btn" onclick= "sup(${nbr})">X</button>
           `;   
            } else if(choix === "texte"){
                //pour activer le bouton
                document.getElementById("btn-first").disabled = true;
                newinput.innerHTML = `
                <input type="text" name="reponseTexte"  class="new">
                <button type="button" class="new_btn" onclick= "sup(${nbr})">X</button>                     
           `; 
            }
            divinputs.appendChild(newinput) ; 
          
          } 

        //  function pour supprimer un input
            function sup (n){ 
               var target = document.getElementById('reponse_'+n) ; 
                    target.remove() ;
               }
        //validation des champs
            var question = document.getElementById('question');
            var points = document.getElementById('points');
            var new_input_text = document.getElementById('reponse');
        document.getElementById('soumet').addEventListener('click',function(e){
           
            if(points.value == "") {
                e.preventDefault() ;
                // alert('ok')
                error.textContent = "**slate a mark**";
            }else if(question.value == "") {
                e.preventDefault() ;
                // alert('ok')
                error.textContent = "**Ask a question**";
            }
            // else if(new_input_text.value == "") {
            //     e.preventDefault() ;
            //     // alert('ok')
            //     error.textContent = "**slate a answer**";                 
        })