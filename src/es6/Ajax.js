export default class AjaxTaxo {
  constructor(){
    this.container = document.querySelector('.filters__container')
    this.filters = this.container.querySelectorAll('a')
    console.log(this.filters)
    this.clickListener()
  }
  clickListener(){
    this.filters.forEach((link) =>
    {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        this.data = link.getAttribute('data-taxonomy')
        this.fetchMethod()
      })
    }
  )}
  fetchMethod() {
      fetch(`path/category/${this.data}`)
      //  get error
        .then((response) => {
          if (!response.ok) {
            throw Error(response.statusText)
          }
          return response
        })

        .then(response => response.text())
      // write html
        .then((html) => {
          console.log(html)
          //this.innerHTMLContainer(html)
          //this.callback()
        })

      // in case of error
        .catch((error) => {
          console.log(error)
          console.log('error on loading')
        })
    }
}

// function performeAccountEdition(route, data, container, menu) {
//     var menu = (typeof menu !== 'undefined') ? menu : '';
//
//     $.ajax({
//         url: Routing.generate(route),
//         method: 'post',
//         data: data,
//         success: function (data) {
//
//                 container.html(data);
//
//
//             initValidator()
//             click_modal()
//
//         },
//         error: printMessage,
//         mimeType: "multipart/form-data",
//         processData: false,
//         contentType: false,
//         cache: false,
//         complete: function(xhr)
//         {
//             if (xhr.status == 302 || xhr.status == 401) {
//                 console.log('gbhjefbdkvjkfbvdiuvbib')
//                 window.document.location = Routing.generate('fo_supplier_account_management_index')+ menu;
//                 reload_page()
//             }
//         }
//     });
