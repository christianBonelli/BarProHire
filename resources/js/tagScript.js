// document.addEventListener('DOMContentLoaded', function () {
//     const tags = document.querySelectorAll('.tag');
//     const searchBtn = document.getElementById('search-btn');
//     let selectedTags = [];

//     tags.forEach(tag => {
//         tag.addEventListener('click', function (event) {
//             event.preventDefault();
//             const tagValue = this.getAttribute('data-tag');

//             if (selectedTags.includes(tagValue)) {
//                 // Deselect the tag
//                 selectedTags = selectedTags.filter(t => t !== tagValue);
//                 this.classList.remove('bg-blue-600', 'text-white');
//                 this.classList.add('bg-blue-100', 'text-blue-800');
//             } else {
//                 if (selectedTags.length < 3) {
//                     // Select the tag
//                     selectedTags.push(tagValue);
//                     this.classList.add('bg-blue-600', 'text-white');
//                     this.classList.remove('bg-blue-100', 'text-blue-800');
//                 }
//             }

//             // Enable or disable the search button based on the selected tags
//             searchBtn.disabled = selectedTags.length === 0;

//             // Optionally, store the selected tags in a hidden input if you're using a form submission
//             // document.getElementById('selected-tags-input').value = selectedTags.join(',');
//         });
//     });

//     searchBtn.addEventListener('click', function () {
//         if (selectedTags.length > 0) {
//             // Here, you can perform the search or redirect to a search results page with the selected tags
//             alert('Tags selezionati: ' + selectedTags.join(', '));
//             // Example: window.location.href = `/search?tags=${selectedTags.join(',')}`;
//         }
//     });
// });
