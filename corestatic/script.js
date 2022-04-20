const clickforburgers = document.getElementById('clickburger')
const dropdown = document.getElementById('dropdownid')
const overlay = document.getElementById('overlaynav')
const navlinks = document.querySelectorAll('.bignav__link')


console.log(navlinks)

clickforburgers.addEventListener('click', onClickDrop)
overlay.addEventListener('click', onClickGONE)


function onClickDrop() {

    if (!dropdown.classList.contains('dropdownn--active')) {
        dropdown.classList.add('dropdownn--active')
        overlay.classList.add('overlaynav--active')

    } else {
        dropdown.classList.remove('dropdownn--active')
        overlay.classList.remove('overlaynav--active')
    }

}

function onClickGONE() {

    if (dropdown.classList.contains('dropdownn--active')) {
        dropdown.classList.remove('dropdownn--active')
        overlay.classList.remove('overlaynav--active')
    }
}