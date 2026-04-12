import React, { useState } from 'react';

function App() {
  const [view, setView] = useState('home'); // Menü kezelése SPA-n belül

  return (
    <div>
      <nav>
        <button onClick={() => setView('game1')}>Tic-Tac-Toe szerű</button>
        <button onClick={() => setView('game2')}>Számológép szerű</button>
      </nav>

      {view === 'game1' && <GameOne />}
      {view === 'game2' && <GameTwo />}
    </div>
  );
}

// Itt jönnek a komponensek (GameOne, GameTwo)...
