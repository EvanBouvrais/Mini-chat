<?php
    session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css?v=<?= filemtime(__DIR__ . '/output.css') ?>" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-[#1B242E] bg-cover flex flex-row">
    
    <div class="flex flex-col">

        <!-- Hello, je sert à faire l'interface des messages! (la partie chiante) -->
        <main id="messages" class="bg-[#171E26] bg-cover h-175 w-auto ml-20 border-2 border-t-0 border-[#2577D9] rounded-[10px] overflow-y-auto p-4 flex flex-col gap-2" aria-live="polite">
            
        </main>

        <!-- Hello, je suis l'ensemble des trucs en bas de page, regarde mes sections ! -->
        <footer class="flex flex-row">

            <!-- Hello, je sert à montrer sur quel compte l'utillisateur est connecté
            (possiblement aussi à mettre tout ce qui est lié au paramètres
            mais ca on verras plus tard) -->


            <section class="bg-[#202A36] border-2 border-b-0 border-l-0 border-[#2577D9] rounded-[10px] w-60 h-30 mt-5 p-3">

                <p class="text-white">Session actuelle :</p>

                <?php if (isset($_SESSION['username'])): ?>

                    <p class="text-white">
                        <?= htmlspecialchars($_SESSION['username']) ?>
                    </p>

                <?php else: ?>

                    <button type="button" onclick="openConnexion()" class="text-blue-400 underline">
                        Se connecter
                    </button>

                <?php endif; ?>

            </section>

            <!-- Fenêtre pop-up de connexion -->
            <section id="fenetreConnexion" class="hidden fixed inset-0 z-50 bg-black/60 items-center justify-center p-4">

                <div class="bg-[#202A36] border border-[#2577D9] rounded-xl p-6 w-full max-w-md">

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-white text-xl font-bold">
                            Connexion
                        </h2>

                        <button type="button" onclick="closeConnexion()" class="text-white text-2xl">
                            &times;
                        </button>
                    </div>

                    <p class="text-gray-300 mb-4">
                        Choisis ton pseudonyme pour rejoindre le chat.
                    </p>

                    <form action="traitement-connexion.php" method="POST">

                        <label for="username" class="text-white block mb-2">
                            Pseudonyme
                        </label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            maxlength="50"
                            required
                            class="w-full rounded-md p-2 mb-4
                                bg-[#151D28] text-white border
                                border-gray-600"
                            placeholder="Ton pseudonyme"
                        >

                        <button type="submit" class="w-full bg-[#2577D9] hover:bg-blue-600 text-white rounded-md p-2">
                            Rejoindre le chat
                        </button>

                    </form>
                </div>
            </section>

            <!-- Hello, je sert à afficher l'input de l'utillisateur et le bouton d'envoi -->
            <section class="flex flex-row mt-10 ml-10">
                
                <!-- Hello, je suis l'input ! -->
                    <textarea id="messageInput" class="bg-[#171E26] border-2 border-[#2577D9] rounded-[10px] h-15 w-190 text-white" aria-label="Votre message" placeholder="Écrivez un message..."></textarea>
                <!-- Hello, je suis le bouton d'envoi -->
                <button type="button" class="border-2 bg-[#3E8FF0] rounded-[10px] h-15 w-15 ml-1 p-1 pt-1 border-[#2577D9]" onclick="envoyerMessage()">
                    <img src="assets/paper-plane-regular-full.svg" alt="Send">
                </button>

            </section>

        </footer>
        <p id="messageStatus" class="text-red-400 ml-10" role="status" aria-live="polite"></p>

    </div>

    <!-- Hello, je sert à faire la liste des contacts (la partie modérément chiante) -->
    <aside class="bg-[#1B242E] border-[#2577D9] border-2 h-auto w-70 rounded-[10px] ml-auto border-b-0 border-r-0">
    
    </aside>

    <script>
        function openConnexion() {
            const fenetre = document.getElementById('fenetreConnexion');

            fenetre.classList.remove('hidden');
            fenetre.classList.add('flex');
        }

        function closeConnexion() {
            const fenetre = document.getElementById('fenetreConnexion');

            fenetre.classList.remove('flex');
            fenetre.classList.add('hidden');
        }
    </script>
    <script src="index.js?v=<?= filemtime(__DIR__ . '/index.js') ?>" defer></script>
</body>
</html>