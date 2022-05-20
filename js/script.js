const draggables = document.querySelectorAll('.draggable')
const containers = document.querySelectorAll('.container')

draggables.forEach(draggable => {
  draggable.addEventListener('dragstart', () => {
    draggable.classList.add('dragging')
  })

  draggable.addEventListener('dragend', () => {
    draggable.classList.remove('dragging')
  })
})

containers.forEach(container => {
  container.addEventListener('dragover', e => {
    e.preventDefault()
    const afterElement = getDragAfterElement(container, e.clientY)
    const draggable = document.querySelector('.dragging')
    if (afterElement == null) {
      container.appendChild(draggable)
    } else {
      container.insertBefore(draggable, afterElement)
    }
  })
})

function getDragAfterElement(container, y) {
  const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')]

  return draggableElements.reduce((closest, child) => {
    const box = child.getBoundingClientRect()
    const offset = y - box.top - box.height / 2
    if (offset < 0 && offset > closest.offset) {
      return { offset: offset, element: child }
    } else {
      return closest
    }
  }, { offset: Number.NEGATIVE_INFINITY }).element
}


$("button.random").on('click', function(){
  var title = $('input.name_1').val();
  var auther = $('input.name_2').val();
  var content = $('textarea.name_3').val();
  console.log(title, auther, content);
  $.ajax({
    method: 'POST',
    url: '../phpCode/add.php',
    data: {
      title : title,
      auther : auther,
      content : content
    },
    success: function (data) {
      $('#results').html(data);
     },
  });
})
function reload_interval(time){
	setTimeout(function(){
		location.reload();
	}, time);
} 

