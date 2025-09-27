{{-- resources/views/games/space-shooter.blade.php --}}
<x-layout>
    <div class="min-h-screen bg-gradient-to-b from-gray-900 via-blue-900 to-black flex flex-col items-center relative overflow-hidden">

        {{-- Animated Background Stars --}}
        <div class="absolute inset-0 overflow-hidden">
            @for($i = 0; $i < 50; $i++)
                <div class="absolute w-1 h-1 bg-white rounded-full animate-pulse"
                     style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 3000) }}ms;"></div>
            @endfor
        </div>

        {{-- Game Header --}}
        <div class="relative z-10 w-full text-center py-8 bg-gradient-to-r from-purple-600/20 to-blue-600/20 backdrop-blur-sm border-b border-white/10">
            <h1 class="text-4xl lg:text-6xl font-bold bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent mb-2">
                🚀 LOGUS SPACE SHOOTER 🚀
            </h1>
            <p class="text-gray-300 text-lg">Verteidige die Galaxis gegen die Alien-Invasion!</p>
        </div>

        {{-- Game UI --}}
        <div class="relative z-10 flex justify-between w-full max-w-4xl px-8 py-6 gap-4">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl px-6 py-3">
                <span class="text-gray-300">Score:</span>
                <span id="scoreDisplay" class="text-2xl font-bold text-yellow-400 ml-2">0</span>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl px-6 py-3">
                <span class="text-gray-300">Leben:</span>
                <span id="livesDisplay" class="text-2xl font-bold text-red-400 ml-2">3</span>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl px-6 py-3">
                <span class="text-gray-300">Level:</span>
                <span id="levelDisplay" class="text-2xl font-bold text-green-400 ml-2">1</span>
            </div>
        </div>

        {{-- Game Canvas --}}
        <div class="relative z-10 mb-8">
            <canvas id="gameCanvas"
                    class="border-2 border-purple-500 rounded-2xl shadow-2xl shadow-purple-500/20"
                    width="800"
                    height="600">
            </canvas>
        </div>

        {{-- Game Controls --}}
        <div class="relative z-10 text-center text-gray-400 mb-8">
            <p class="mb-2"><strong class="text-white">Steuerung:</strong> ← → Pfeiltasten zum Bewegen | Leertaste zum Schießen</p>
            <p>Drücke <strong class="text-purple-400">R</strong> zum Neustarten | <strong class="text-purple-400">P</strong> für Pause</p>
        </div>

        {{-- Game Over Modal --}}
        <div id="gameOver" class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 hidden">
            <div class="bg-gradient-to-br from-gray-900 to-black border-2 border-purple-500 rounded-3xl p-8 text-center max-w-md mx-4 shadow-2xl shadow-purple-500/30">
                <h2 class="text-4xl font-bold text-red-400 mb-4">GAME OVER</h2>
                <div class="space-y-2 mb-6">
                    <p class="text-gray-300">Dein finaler Score:</p>
                    <p id="finalScore" class="text-3xl font-bold text-yellow-400">0</p>
                    <p class="text-gray-300">Level erreicht:</p>
                    <p id="finalLevel" class="text-2xl font-bold text-green-400">1</p>
                </div>
                <button onclick="restartGame()"
                        class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-purple-500/30">
                    🎮 Nochmal spielen
                </button>
                <div class="mt-4">
                    <a href="{{ url('/games') }}"
                       class="inline-block text-gray-400 hover:text-white transition-colors">
                        ← Zurück zu den Spielen
                    </a>
                </div>
            </div>
        </div>

        {{-- Victory Modal --}}
        <div id="victory" class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 hidden">
            <div class="bg-gradient-to-br from-yellow-900 to-orange-900 border-2 border-yellow-500 rounded-3xl p-8 text-center max-w-md mx-4 shadow-2xl shadow-yellow-500/30">
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">🏆 VICTORY! 🏆</h2>
                <div class="space-y-2 mb-6">
                    <p class="text-gray-200">Glückwunsch! Du hast alle Levels geschafft!</p>
                    <p class="text-gray-300">Finaler Score:</p>
                    <p id="victoryScore" class="text-3xl font-bold text-yellow-400">0</p>
                </div>
                <button onclick="restartGame()"
                        class="bg-gradient-to-r from-yellow-600 to-orange-600 hover:from-yellow-700 hover:to-orange-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-yellow-500/30">
                    🎮 Nochmal spielen
                </button>
            </div>
        </div>
    </div>

    <script>
        // Game Variables
        const canvas = document.getElementById('gameCanvas');
        const ctx = canvas.getContext('2d');

        let gameState = 'playing';
        let score = 0;
        let lives = 3;
        let level = 1;
        let keys = {};

        // Game Objects
        let player = {
            x: canvas.width / 2 - 25,
            y: canvas.height - 80,
            width: 50,
            height: 40,
            speed: 5
        };

        let bullets = [];
        let enemies = [];
        let enemyBullets = [];
        let particles = [];

        // Event Listeners
        document.addEventListener('keydown', (e) => {
            keys[e.code] = true;
            if (e.code === 'Space') {
                e.preventDefault();
                shootBullet();
            }
            if (e.code === 'KeyR') {
                restartGame();
            }
            if (e.code === 'KeyP') {
                togglePause();
            }
        });

        document.addEventListener('keyup', (e) => {
            keys[e.code] = false;
        });

        // Game Functions
        function shootBullet() {
            if (gameState !== 'playing') return;
            bullets.push({
                x: player.x + player.width / 2 - 2,
                y: player.y,
                width: 4,
                height: 10,
                speed: 7
            });
        }

        function createEnemy() {
            enemies.push({
                x: Math.random() * (canvas.width - 40),
                y: -40,
                width: 40,
                height: 30,
                speed: 1 + level * 0.3,
                lastShot: 0
            });
        }

        function createParticle(x, y, color = '#FFD700') {
            for (let i = 0; i < 8; i++) {
                particles.push({
                    x: x,
                    y: y,
                    vx: (Math.random() - 0.5) * 6,
                    vy: (Math.random() - 0.5) * 6,
                    life: 30,
                    color: color
                });
            }
        }

        function updatePlayer() {
            if (keys['ArrowLeft'] && player.x > 0) {
                player.x -= player.speed;
            }
            if (keys['ArrowRight'] && player.x < canvas.width - player.width) {
                player.x += player.speed;
            }
        }

        function updateBullets() {
            // Player bullets
            bullets.forEach((bullet, index) => {
                bullet.y -= bullet.speed;
                if (bullet.y < 0) {
                    bullets.splice(index, 1);
                }
            });

            // Enemy bullets
            enemyBullets.forEach((bullet, index) => {
                bullet.y += bullet.speed;
                if (bullet.y > canvas.height) {
                    enemyBullets.splice(index, 1);
                }
            });
        }

        function updateEnemies() {
            enemies.forEach((enemy, index) => {
                enemy.y += enemy.speed;

                // Enemy shooting
                if (Date.now() - enemy.lastShot > 2000 + Math.random() * 1000) {
                    enemyBullets.push({
                        x: enemy.x + enemy.width / 2 - 2,
                        y: enemy.y + enemy.height,
                        width: 4,
                        height: 8,
                        speed: 3
                    });
                    enemy.lastShot = Date.now();
                }

                // Remove enemies that go off screen
                if (enemy.y > canvas.height) {
                    enemies.splice(index, 1);
                    lives--;
                    updateUI();
                }
            });
        }

        function updateParticles() {
            particles.forEach((particle, index) => {
                particle.x += particle.vx;
                particle.y += particle.vy;
                particle.life--;

                if (particle.life <= 0) {
                    particles.splice(index, 1);
                }
            });
        }

        function checkCollisions() {
            // Player bullets vs enemies
            bullets.forEach((bullet, bulletIndex) => {
                enemies.forEach((enemy, enemyIndex) => {
                    if (bullet.x < enemy.x + enemy.width &&
                        bullet.x + bullet.width > enemy.x &&
                        bullet.y < enemy.y + enemy.height &&
                        bullet.y + bullet.height > enemy.y) {

                        createParticle(enemy.x + enemy.width/2, enemy.y + enemy.height/2, '#FF4444');
                        bullets.splice(bulletIndex, 1);
                        enemies.splice(enemyIndex, 1);
                        score += 10 * level;
                        updateUI();
                    }
                });
            });

            // Enemy bullets vs player
            enemyBullets.forEach((bullet, index) => {
                if (bullet.x < player.x + player.width &&
                    bullet.x + bullet.width > player.x &&
                    bullet.y < player.y + player.height &&
                    bullet.y + bullet.height > player.y) {

                    createParticle(player.x + player.width/2, player.y + player.height/2, '#FF0000');
                    enemyBullets.splice(index, 1);
                    lives--;
                    updateUI();
                }
            });

            // Enemies vs player
            enemies.forEach((enemy, index) => {
                if (enemy.x < player.x + player.width &&
                    enemy.x + enemy.width > player.x &&
                    enemy.y < player.y + player.height &&
                    enemy.y + enemy.height > player.y) {

                    createParticle(player.x + player.width/2, player.y + player.height/2, '#FF0000');
                    enemies.splice(index, 1);
                    lives--;
                    updateUI();
                }
            });
        }

        function drawPlayer() {
            ctx.fillStyle = '#00FF00';
            ctx.fillRect(player.x, player.y, player.width, player.height);

            // Player details
            ctx.fillStyle = '#00AA00';
            ctx.fillRect(player.x + 5, player.y + 5, player.width - 10, player.height - 10);

            // Engine glow
            ctx.fillStyle = '#0088FF';
            ctx.fillRect(player.x + 20, player.y + player.height, 10, 5);
        }

        function drawBullets() {
            ctx.fillStyle = '#FFFF00';
            bullets.forEach(bullet => {
                ctx.fillRect(bullet.x, bullet.y, bullet.width, bullet.height);
            });

            ctx.fillStyle = '#FF4444';
            enemyBullets.forEach(bullet => {
                ctx.fillRect(bullet.x, bullet.y, bullet.width, bullet.height);
            });
        }

        function drawEnemies() {
            ctx.fillStyle = '#FF0000';
            enemies.forEach(enemy => {
                ctx.fillRect(enemy.x, enemy.y, enemy.width, enemy.height);

                // Enemy details
                ctx.fillStyle = '#AA0000';
                ctx.fillRect(enemy.x + 5, enemy.y + 5, enemy.width - 10, enemy.height - 10);
            });
            ctx.fillStyle = '#FF0000';
        }

        function drawParticles() {
            particles.forEach(particle => {
                ctx.globalAlpha = particle.life / 30;
                ctx.fillStyle = particle.color;
                ctx.fillRect(particle.x, particle.y, 3, 3);
            });
            ctx.globalAlpha = 1;
        }

        function updateUI() {
            document.getElementById('scoreDisplay').textContent = score;
            document.getElementById('livesDisplay').textContent = lives;
            document.getElementById('levelDisplay').textContent = level;

            if (lives <= 0) {
                gameOver();
            }

            // Level progression
            if (score > 0 && score % 500 === 0 && enemies.length === 0) {
                level++;
                updateUI();
            }

            // Victory condition
            if (level > 10) {
                victory();
            }
        }

        function gameOver() {
            gameState = 'gameOver';
            document.getElementById('finalScore').textContent = score;
            document.getElementById('finalLevel').textContent = level;
            document.getElementById('gameOver').classList.remove('hidden');
        }

        function victory() {
            gameState = 'victory';
            document.getElementById('victoryScore').textContent = score;
            document.getElementById('victory').classList.remove('hidden');
        }

        function restartGame() {
            gameState = 'playing';
            score = 0;
            lives = 3;
            level = 1;
            bullets = [];
            enemies = [];
            enemyBullets = [];
            particles = [];

            player.x = canvas.width / 2 - 25;
            player.y = canvas.height - 80;

            document.getElementById('gameOver').classList.add('hidden');
            document.getElementById('victory').classList.add('hidden');

            updateUI();
        }

        function togglePause() {
            gameState = gameState === 'playing' ? 'paused' : 'playing';
        }

        // Game Loop
        let lastEnemySpawn = 0;
        function gameLoop() {
            if (gameState !== 'playing') {
                requestAnimationFrame(gameLoop);
                return;
            }

            // Clear canvas with gradient background
            const gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
            gradient.addColorStop(0, '#000428');
            gradient.addColorStop(1, '#004e92');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Spawn enemies
            if (Date.now() - lastEnemySpawn > Math.max(1000 - level * 50, 300)) {
                createEnemy();
                lastEnemySpawn = Date.now();
            }

            // Update game objects
            updatePlayer();
            updateBullets();
            updateEnemies();
            updateParticles();
            checkCollisions();

            // Draw everything
            drawPlayer();
            drawBullets();
            drawEnemies();
            drawParticles();

            requestAnimationFrame(gameLoop);
        }

        // Start the game
        updateUI();
        gameLoop();
    </script>
</x-layout>
