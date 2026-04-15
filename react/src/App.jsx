import { useState } from 'react';
import './App.css';

const TicTacToe = () => {
    const [board, setBoard] = useState(Array(9).fill(null));
    const [xIsNext, setXIsNext] = useState(true);

    const calculateWinner = (squares) => {
        const lines = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8],
            [0, 3, 6], [1, 4, 7], [2, 5, 8],
            [0, 4, 8], [2, 4, 6]
        ];
        for (let i = 0; i < lines.length; i++) {
            const [a, b, c] = lines[i];
            if (squares[a] && squares[a] === squares[b] && squares[a] === squares[c]) {
                return squares[a];
            }
        }
        return null;
    };

    const handleClick = (i) => {
        const boardCopy = [...board];
        if (calculateWinner(boardCopy) || boardCopy[i]) return;
        boardCopy[i] = xIsNext ? 'X' : 'O';
        setBoard(boardCopy);
        setXIsNext(!xIsNext);
    };

    const winner = calculateWinner(board);
    const status = winner ? `Győztes: ${winner}` : `Következő játékos: ${xIsNext ? 'X' : 'O'}`;

    return (
        <div>
            <h3>Amőba</h3>
            <div>{status}</div>
            <div className="tic-tac-toe-board">
                {board.map((cell, i) => (
                    <button key={i} className="tic-tac-toe-cell" onClick={() => handleClick(i)}>
                        {cell}
                    </button>
                ))}
            </div>
            <button style={{ marginTop: '10px' }} onClick={() => setBoard(Array(9).fill(null))}>Újra</button>
        </div>
    );
};

const Calculator = () => {
    const [input, setInput] = useState('');

    const handleClick = (value) => {
        setInput(input + value);
    };

    const calculate = () => {
        try {
            setInput(eval(input).toString());
        } catch {
            setInput("Hiba");
        }
    };

    const clear = () => {
        setInput('');
    };

    return (
        <div>
            <h3>Számológép</h3>
            <input type="text" value={input} readOnly style={{ width: '215px', padding: '5px', fontSize: '18px' }} />
            <div className="calc-grid">
                {['7', '8', '9', '/'].map(btn => <button key={btn} className="calc-btn" onClick={() => handleClick(btn)}>{btn}</button>)}
                {['4', '5', '6', '*'].map(btn => <button key={btn} className="calc-btn" onClick={() => handleClick(btn)}>{btn}</button>)}
                {['1', '2', '3', '-'].map(btn => <button key={btn} className="calc-btn" onClick={() => handleClick(btn)}>{btn}</button>)}
                {['C', '0', '=', '+'].map(btn => (
                    <button
                        key={btn}
                        className="calc-btn"
                        onClick={btn === 'C' ? clear : btn === '=' ? calculate : () => handleClick(btn)}
                    >
                        {btn}
                    </button>
                ))}
            </div>
        </div>
    );
};

function App() {
    const [activeApp, setActiveApp] = useState('tictactoe');

    return (
        <div className="spa-container">
            <h2>Egyoldalas Alkalmazás (SPA)</h2>
            <div className="spa-nav" style={{ marginBottom: '20px' }}>
                <button onClick={() => setActiveApp('tictactoe')} style={{ fontWeight: activeApp === 'tictactoe' ? 'bold' : 'normal' }}>Amőba Játék</button>
                <button onClick={() => setActiveApp('calculator')} style={{ fontWeight: activeApp === 'calculator' ? 'bold' : 'normal' }}>Számológép</button>
            </div>

            <div style={{ padding: '20px', border: '1px solid #ccc', borderRadius: '5px' }}>
                {activeApp === 'tictactoe' && <TicTacToe />}
                {activeApp === 'calculator' && <Calculator />}
            </div>
        </div>
    );
}

export default App;