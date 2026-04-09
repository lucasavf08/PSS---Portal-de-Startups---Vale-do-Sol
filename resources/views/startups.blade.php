<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Startups</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex flex-col">

    <header class="bg-blue-600 text-white p-6 shadow-md">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold italic">Portal de Startups - Vale do Sol</h1>
        </div>
    </header>

    <main class="flex-grow p-4 md:p-8">
        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <section class="bg-white p-6 rounded-xl shadow-lg h-fit">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">Nova Startup</h2>
                <form id="form" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nome Fantasia</label>
                        <input type="text" id="nome" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Setor de Atuação</label>
                        <input type="text" id="setor" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">CNPJ (Único)</label>
                        <input type="text" id="cnpj" class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 outline-none" placeholder="00.000.000/0000-00" required>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition duration-200">
                        Cadastrar Startup
                    </button>
                </form>
            </section>

            <section>
                <h2 class="text-xl font-semibold mb-4 flex justify-between items-center">
                    Startups Cadastradas
                    <span id="contador" class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">0</span>
                </h2>
                
                <div class="overflow-y-auto max-h-[500px] pr-2">
                    <ul id="lista" class="space-y-3">
                        </ul>
                </div>
            </section>

        </div>
    </main>

    <footer class="bg-white text-center p-4 text-gray-500 text-sm border-t">
        &copy; 2026
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const API = "/api/startups";

            // Função para buscar dados (GET) e atualizar a tela
            async function carregar() {
                try {
                    const res = await fetch(API, { headers: { "Accept": "application/json" } });
                    const data = await res.json();
                    
                    const lista = document.getElementById("lista");
                    const contador = document.getElementById("contador");
                    
                    lista.innerHTML = "";
                    contador.innerText = data.length;

                    data.forEach(s => {
                        lista.innerHTML += `
                            <li class="p-4 bg-white border-l-4 border-blue-500 rounded shadow-sm hover:shadow-md transition">
                                <div class="font-bold text-gray-800">${s.nome_fantasia}</div>
                                <div class="text-sm text-gray-600">${s.setor}</div>
                                <div class="text-xs text-gray-400 mt-1 font-mono">${s.cnpj}</div>
                            </li>
                        `;
                    });
                } catch (e) {
                    console.error("Erro na listagem:", e);
                }
            }

            // Função para enviar dados (POST)
            const form = document.getElementById("form");
            form.addEventListener("submit", async (e) => {
                e.preventDefault();

                const corpo = {
                    nome_fantasia: document.getElementById("nome").value,
                    setor: document.getElementById("setor").value,
                    cnpj: document.getElementById("cnpj").value
                };

                try {
                    const res = await fetch(API, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify(corpo)
                    });

                    if (res.ok) {
                        form.reset();
                        carregar(); // ATUALIZAÇÃO DINÂMICA: Recarrega a lista sem F5
                    } else {
                        const erro = await res.json();
                        const msg = erro.errors ? Object.values(erro.errors).flat().join('\n') : "Erro desconhecido";
                        alert("Falha na Validação:\n" + msg);
                    }
                } catch (e) {
                    alert("Erro ao conectar com a API.");
                }
            });

            carregar(); // Carrega ao abrir a página
        });
    </script>
</body>
</html>