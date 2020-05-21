<?php
  require "header.php";
?>


<style>
  body{
  background-image: url('img/bg.jpg');
  background-repeat: no-repeat;
  background-size: auto;
  background-attachment: fixed;
  background-position: center;
}
h1{
  color: grey;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}    
.paragraph{
  display: block;
  font-size: 1.17em;
  margin-block-start: 1em;
  margin-block-end: 1em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
  text-align: center;
}  
.features{
background: rgb(231, 231, 231);
color: rgb(20, 1, 1);
padding: 20px;
display: flex;
flex-direction: row;
flex-wrap: wrap;
}
.features figure{
margin: auto;
width: 200px;
text-align: center;
}
.features figure img{
width: 200px;
border-radius: 10%;
box-shadow: grey 0 0 10px;
border: 1px solid white;
}


}

</style>

    <body>
      <br>
      <br>
      <h1>Noi combinam frumosul cu utilul</h1> 
      <p class="paragraph">Ti-ai cumparat o casa noua si nu stii cum sa o amenajezi? Ce culori sa folosesti?</br> Cum sa transformi un spatiu tern in unul care sa te reprezinte, sa te faca sa te simti “acasa”?</br>

Daca iti pui aceste intrebari, inseamna ca ai nevoie de ajutorul unor designeri de interior.</br>

Studioul nostru de design te ajuta sa gasesti raspunsul la aceste intrebari.</br> Oferim o noua viziune asupra spatiului, o noua infatisare, prin modelarea si completarea dorintelor beneficiarilor.
</br>In pagina de galerie fiecare designer isi va promova design-ul facut si astfel vei putea decide care ti se potriveste cel mai bine! :)</p>
      <br>
      <br>
      <br>  
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    <section class="features" style="width:100%;">
            <figure>
                    <a href="stil1.php">
                    <img src="img/9.jpg"  alt="Bucatarie">
                    <figcaption>Bucatarie</figcaption>
                    </a>
            </figure>
            <figure>
                    <a href="stil2.php">
                    <img src="img/baie1.jpg" alt="Baie">
                    <figcaption>Baie</figcaption>
                    </a>
            </figure>
            <figure>
                    <a href="stil3.php">
                    <img src="img/salon.jpg" alt="Salon">
                    <figcaption>Salon</figcaption>
                    </a>
            </figure>
            <figure>
                    <a href="stil4.php">
                    <img src="img/dormitor.jpg" alt="Dormitor">
                    <figcaption>Dormitor</figcaption>
                    </a>
            </figure>

      </section>     
     
      <script type="text/javascript">
        var images = new Array();
        function preloadImages(){
          for (i=0; i < preloadImages.arguments.length; i++){
                images[i] = new Image();
                images[i].src = preloadImages.arguments[i];
          }
        }
        preloadImages("img/minimalist.jpg", "img/midcentury.jpg", "img/industrial.jpg", "img/traditional.jpg","img/bohemian.jpg");
      </script>     

     
