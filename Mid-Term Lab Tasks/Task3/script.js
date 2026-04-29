// Game variables
let currentPlayer = 'X';
let board = ['', '', '', '', '', '', '', '', ''];
let gameActive = true;
let xWins = 0;
let oWins = 0;

// Winning combinations
const winConditions = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];

// Initialize game when page loads
function initGame() {
    createBoard();
    createScoreBoard();
    updateStatus();
    addResetListener();
}

// Create game board using DOM manipulation
function createBoard() {
    const boardElement = document.getElementById('board');
    
    // Create 9 cells
    for (let i = 0; i < 9; i++) {
        const cell = document.createElement('div');
        cell.classList.add('cell');
        cell.setAttribute('data-index', i);
        
        // Add click event listener to each cell
        cell.addEventListener('click', handleCellClick);
        
        boardElement.appendChild(cell);
    }
}

// Create score board using DOM manipulation
function createScoreBoard() {
    const scoreBoardElement = document.getElementById('scoreBoard');
    
    // Create X score paragraph
    const xScorePara = document.createElement('p');
    xScorePara.textContent = 'Player X Wins: ';
    const xScoreSpan = document.createElement('span');
    xScoreSpan.id = 'xScore';
    xScoreSpan.textContent = '0';
    xScorePara.appendChild(xScoreSpan);
    
    // Create O score paragraph
    const oScorePara = document.createElement('p');
    oScorePara.textContent = 'Player O Wins: ';
    const oScoreSpan = document.createElement('span');
    oScoreSpan.id = 'oScore';
    oScoreSpan.textContent = '0';
    oScorePara.appendChild(oScoreSpan);
    
    scoreBoardElement.appendChild(xScorePara);
    scoreBoardElement.appendChild(oScorePara);
}

// Add event listener to reset button
function addResetListener() {
    const resetBtn = document.getElementById('resetBtn');
    resetBtn.addEventListener('click', resetGame);
}

// Update status display
function updateStatus() {
    const statusDisplay = document.getElementById('status');
    statusDisplay.textContent = `Player ${currentPlayer}'s turn`;
}

// Handle cell click
function handleCellClick(event) {
    const clickedCell = event.target;
    const clickedIndex = clickedCell.getAttribute('data-index');
    
    // Check if cell is already filled or game is over
    if (board[clickedIndex] !== '' || !gameActive) {
        return;
    }
    
    // Update board array
    board[clickedIndex] = currentPlayer;
    
    // Update cell display using DOM manipulation
    clickedCell.textContent = currentPlayer;
    
    // Check for win or draw
    checkWin();
}

// Check for win or draw
function checkWin() {
    let roundWon = false;
    let winningCombo = [];
    
    // Check all win conditions
    for (let i = 0; i < winConditions.length; i++) {
        const condition = winConditions[i];
        let a = board[condition[0]];
        let b = board[condition[1]];
        let c = board[condition[2]];
        
        if (a === '' || b === '' || c === '') {
            continue;
        }
        
        if (a === b && b === c) {
            roundWon = true;
            winningCombo = condition;
            break;
        }
    }
    
    if (roundWon) {
        const statusDisplay = document.getElementById('status');
        statusDisplay.textContent = `Player ${currentPlayer} wins!`;
        gameActive = false;
        
        // Highlight winning cells using DOM manipulation
        const cells = document.querySelectorAll('.cell');
        winningCombo.forEach(index => {
            cells[index].classList.add('winning');
        });
        
        // Update score using DOM manipulation
        if (currentPlayer === 'X') {
            xWins++;
            document.getElementById('xScore').textContent = xWins;
        } else {
            oWins++;
            document.getElementById('oScore').textContent = oWins;
        }
        return;
    }
    
    // Check for draw
    let draw = !board.includes('');
    if (draw) {
        const statusDisplay = document.getElementById('status');
        statusDisplay.textContent = "It's a draw!";
        gameActive = false;
        return;
    }
    
    // Switch player
    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
    updateStatus();
}

// Reset game
function resetGame() {
    currentPlayer = 'X';
    board = ['', '', '', '', '', '', '', '', ''];
    gameActive = true;
    
    // Update status using DOM manipulation
    updateStatus();
    
    // Clear all cells using DOM manipulation
    const cells = document.querySelectorAll('.cell');
    cells.forEach(cell => {
        cell.textContent = '';
        cell.classList.remove('winning');
    });
}

// Start game when page loads
initGame();
