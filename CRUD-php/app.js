const cuerpo = document.querySelector("#nueva-fila")

const getBook = async () => {
  const respRaw = await fetch('get_book.php')
  const libros = await respRaw.json()
  console.log(libros)
  cuerpo.innerHTML=''
  libros.forEach( libro => {
    const fila = document.createElement('div')
    fila.classList.add('row')
    const celda1 = document.createElement('div')
    celda1.classList.add('col','border')
    celda1.innerText=libro[1]
    fila.append(celda1)
    const celda2 = document.createElement('div')
    celda2.classList.add('col','border')
    celda2.innerText=libro[2]
    fila.append(celda2)
    const celda3 = document.createElement('div')
    celda3.classList.add('col','border')
    const btn1= document.createElement('a')
    btn1.classList.add('btn','btn-warning')
    btn1.innerText = 'Editar'
    btn1.href='edit_book.php?id='+libro[0]
    celda3.append(btn1)
    const btn2= document.createElement('a')
    btn2.classList.add('btn','btn-danger')
    btn2.innerText = 'X'
    btn2.href='delete_book.php?id='+libro[0]
    celda3.append(btn2)
    fila.append(celda3)
    cuerpo.append(fila)
  })

  
  
}

getBook()