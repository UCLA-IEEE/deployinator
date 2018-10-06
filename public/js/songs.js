$(() => {
  $('.song-form').submit(e => {
    e.preventDefault()

    let songData = {
      title: $('input[name="title"]').val(),
      artist: $('input[name="artist"]').val(),
      genre: $('input[name="genre"]').val()
    }

    $.ajax({ url: '/songs/create', type: 'POST', data: songData }).done(res => {
      res = JSON.parse(res)

      changeResponseMessage(res.message)

      if (res.status === 'success') {
        $('input').val('')
        appendNewSongToList(songData)
      }
    })
  })

  $('input').focus(() => changeResponseMessage(''))
})

function appendNewSongToList(songData) {
  let newSongHTML = ['<li>', songData.title, ' ', songData.artist, ' ', songData.genre, '</li>'].join('')

  $(newSongHTML).appendTo('.song-list')
}

function changeResponseMessage(message) {
  $('.response-message').text(message)
}
