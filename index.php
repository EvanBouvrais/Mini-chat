<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-[#1B242E] bg-cover flex flex-row">
    
    <div class="flex flex-col">

        <!-- Hello, je sert à faire l'interface des messages! (la partie chiante) -->
        <main class="bg-[#171E26] bg-cover h-175 w-auto ml-20 border-2 border-t-0 border-[#2577D9] rounded-[10px]">  
            
        </main>

        <!-- Hello, je suis l'ensemble des trucs en bas de page, regarde mes sections ! -->
        <footer class="flex flex-row">

            <!-- Hello, je sert à montrer sur quel compte l'utillisateur est connecté
            (possiblement aussi à mettre tout ce qui est lié au paramètres
            mais ca on verras plus tard) -->
            <section class="bg-[#202A36] border-2 border-b-0 border-l-0 border-[#2577D9] rounded-[10px] w-60 h-30 mt-5">
                <p class="text-white">Session actuelle:</p>
            </section>

            <!-- Hello, je sert à afficher l'input de l'utillisateur et le bouton d'envoi -->
            <section class="flex flex-row mt-10 ml-10">
                
                <!-- Hello, je suis l'input ! -->
                    <textarea name="" id="" class="bg-[#171E26] border-2 border-[#2577D9] rounded-[10px] h-15 w-190"></textarea>
                <!-- Hello, je suis le bouton d'envoi -->
                <button class="border-2 bg-[#3E8FF0] rounded-[10px] h-15 w-15 ml-1 p-1 pt-1 border-[#2577D9]">
                    <img src="assets/paper-plane-regular-full.svg" alt="Send">
                </button>

            </section>

        </footer>

    </div>

    <!-- Hello, je sert à faire la liste des contacts (la partie modérément chiante) -->
    <aside class=" bg-[#1B242E] border-[#2577D9] border-2 h-auto w-70 rounded-[10px] ml-auto border-b-0 border-r-0">
    
    </aside>


</body>
</html> 