<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste SSE - Diagnóstico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .status {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .connected {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .disconnected {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .connecting {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
        #messages {
            height: 300px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            background: #fafafa;
            font-family: monospace;
        }
        .message {
            padding: 5px;
            margin: 2px 0;
            border-bottom: 1px solid #eee;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        button:disabled {
            background: #6c757d;
            cursor: not-allowed;
        }
        .error {
            color: #dc3545;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🧪 Teste de Conexão SSE</h2>
        
        <div>
            <button onclick="connectSSE()" id="connectBtn">🔌 Conectar</button>
            <button onclick="disconnectSSE()" id="disconnectBtn" disabled>❌ Desconectar</button>
            <button onclick="clearMessages()">🧹 Limpar</button>
        </div>
        
        <div id="status" class="status disconnected">
            ⚪ Status: Desconectado
        </div>
        
        <div>
            <strong>📨 Mensagens recebidas:</strong>
            <div id="messages"></div>
        </div>
        
        <div>
            <strong>📊 Estatísticas:</strong>
            <div id="stats">
                Mensagens: 0 | Última atualização: -
            </div>
        </div>
        
        <div id="errors"></div>
    </div>

    <script>
        let eventSource = null;
        let messageCount = 0;
        
        function updateStatus(state, text) {
            const statusDiv = document.getElementById('status');
            statusDiv.className = 'status ' + state;
            statusDiv.innerHTML = text;
        }
        
        function addMessage(data, type = 'info') {
            const messagesDiv = document.getElementById('messages');
            const messageElement = document.createElement('div');
            messageElement.className = 'message';
            
            const time = new Date().toLocaleTimeString();
            messageElement.innerHTML = `<strong>[${time}]</strong> ${JSON.stringify(data, null, 2)}`;
            
            messagesDiv.appendChild(messageElement);
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
            
            messageCount++;
            updateStats();
        }
        
        function updateStats() {
            const statsDiv = document.getElementById('stats');
            statsDiv.innerHTML = `Mensagens: ${messageCount} | Última atualização: ${new Date().toLocaleTimeString()}`;
        }
        
        function addError(error) {
            const errorsDiv = document.getElementById('errors');
            const errorElement = document.createElement('div');
            errorElement.className = 'error';
            errorElement.innerHTML = `❌ ${error}`;
            errorsDiv.appendChild(errorElement);
        }
        
        function clearMessages() {
            document.getElementById('messages').innerHTML = '';
            document.getElementById('errors').innerHTML = '';
            messageCount = 0;
            updateStats();
        }
        
        function connectSSE() {
            if (eventSource) {
                eventSource.close();
            }
            
            clearMessages();

            const basePath = window.location.pathname.includes('/portfolio-transito/') 
                ? '/portfolio-transito/admin/sse.php'
                : 'sse.php';
            
            console.log('🔌 Conectando a:', basePath);
            addMessage({info: `Conectando a ${basePath}...`});
            
            updateStatus('connecting', '🟡 Status: Conectando...');
            
            try {
                eventSource = new EventSource(basePath);
                
                eventSource.onopen = (e) => {
                    console.log('✅ Conexão estabelecida');
                    updateStatus('connected', '🟢 Status: Conectado');
                    addMessage({status: 'Conexão estabelecida com sucesso!'});
                    
                    document.getElementById('connectBtn').disabled = true;
                    document.getElementById('disconnectBtn').disabled = false;
                };
                
                eventSource.onmessage = (e) => {
                    console.log('📨 Mensagem recebida:', e.data);
                    
                    try {
                        const data = JSON.parse(e.data);
                        addMessage(data);
                    } catch (error) {
                        addMessage({raw: e.data});
                    }
                };
                
                eventSource.onerror = (e) => {
                    console.error('❌ Erro SSE:', e);
                    
                    let errorMessage = 'Erro na conexão SSE';
                    
                    if (eventSource.readyState === EventSource.CLOSED) {
                        errorMessage = 'Conexão fechada permanentemente';
                        updateStatus('disconnected', '🔴 Status: Desconectado (Falha)');
                        addMessage({error: errorMessage});
                        addError(errorMessage);
                        
                        document.getElementById('connectBtn').disabled = false;
                        document.getElementById('disconnectBtn').disabled = true;
                        
                    } else if (eventSource.readyState === EventSource.CONNECTING) {
                        errorMessage = 'Tentando reconectar...';
                        updateStatus('connecting', '🟡 Status: Reconectando...');
                        addMessage({info: errorMessage});
                    }
                    
                    addError(`Estado: ${eventSource.readyState} - ${errorMessage}`);
                };

                eventSource.addEventListener('heartbeat', (e) => {
                    console.log('💓 Heartbeat recebido');
                });
                
            } catch (error) {
                console.error('Erro ao criar EventSource:', error);
                addError('Erro ao criar conexão: ' + error.message);
                updateStatus('disconnected', '🔴 Status: Erro ao conectar');
            }
        }
        
        function disconnectSSE() {
            if (eventSource) {
                eventSource.close();
                eventSource = null;
                console.log('🔌 Conexão fechada pelo usuário');
                updateStatus('disconnected', '⚪ Status: Desconectado (Usuário)');
                addMessage({info: 'Conexão fechada pelo usuário'});
                
                document.getElementById('connectBtn').disabled = false;
                document.getElementById('disconnectBtn').disabled = true;
            }
        }

        window.onload = () => {
            console.log('📄 Página carregada - clique em Conectar para iniciar');
        };

        window.onbeforeunload = () => {
            if (eventSource) {
                eventSource.close();
            }
        };
    </script>
</body>
</html>