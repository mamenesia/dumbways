function drawLines(n) {
  // buat row dan column sebanyak n
  for(let row = 0; row < n; row++) {
    let lines = "";

    for(let col = 0; col < n; col++){
      // jika row == col maka, tempatkan *, jika tidak space kosong;
      if(col==row){
        lines += '*';
      } else {
        lines += ' ';
      }
    }
    console.log(lines);
  }
}

drawLines(8);