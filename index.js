const messageInput = document.getElementById("messageInput");
const messagesContainer = document.getElementById("messages");
const messageStatus = document.getElementById("messageStatus");
const displayedMessageIds = new Set();

function afficherMessage(message) {
    const id = String(message.id);
    if (displayedMessageIds.has(id)) return;

    const element = document.createElement("div");
    element.classList.add("message");

    const header = document.createElement("div");
    header.classList.add("flex", "items-center", "gap-2");

    const username = document.createElement("span");
    username.classList.add("text-purple-400");
    username.textContent = message.username;

    const time = document.createElement("span");
    time.classList.add("text-gray-400", "text-xs");
    time.textContent = message.time;

    const content = document.createElement("div");
    content.classList.add("text-white");
    content.textContent = message.content;

    header.append(username, time);
    element.append(header, content);
    messagesContainer.appendChild(element);
    displayedMessageIds.add(id);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

async function chargerMessages() {
    try {
        const response = await fetch("connexion.php");
        const result = await response.json();

        if (!response.ok || !result.success) {
            throw new Error(result.message || "Impossible de charger les messages.");
        }

        result.messages.forEach(afficherMessage);
    } catch (error) {
        messageStatus.textContent = error.message;
    }
}

async function envoyerMessage() {
    const content = messageInput.value.trim();
    if (content === "") return;

    try {
        const response = await fetch("connexion.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ content }),
        });
        const result = await response.json();

        if (!response.ok || !result.success) {
            throw new Error(result.message || "Impossible d’envoyer le message.");
        }

        afficherMessage(result.message);
        messageInput.value = "";
        messageStatus.textContent = "";
    } catch (error) {
        messageStatus.textContent = error.message;
    }
}

chargerMessages();