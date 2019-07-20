function count_handshake(n) {
  if(n == 0 || n == 1) {
    // jika tidak ada orang atau orang sendirian tidak ada jabat tangan, kecuali jabat tangan sendiri.
    return 0
  } else {
    // total jabat tangan 1 orang di tambah total jabat tangan orang lainnya.
    return (n-1) + (count_handshake(n-1));
  }
}

count_handshake(3);