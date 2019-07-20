function betweenDays(date1, date2) {
  const day1 = new Date(date1);
  const day2 = new Date(date2);

  // mencari beda hari dari kedua tanggal
  const diffDays = parseInt((day2 - day1) / (1000 * 60 * 60 * 24)); 
  let result = [];
  let startDate;

  // incrementing day1 to day 2
  for(let i = 0; i < diffDays; i++){
    startDate = new Date(day1.setDate(day1.getDate()+1));
    // push day1 + 1 to day 2 into result array
    result.push(`${startDate.getFullYear()}-${startDate.getMonth() + 1}-${startDate.getDate()}`);
  }

  // print and returning result array;
  console.log(result);
  return result;  
}

betweenDays('2018-10-01', '2018-11-05');
