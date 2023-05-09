import JustValidate from 'just-validate';

const validation = new JustValidate(document.querySelector('#register'));

function validate() {
    validation
    .addField(document.querySelector('#fname'), [
        {
            rule: "required",
        }

    ]);

}
