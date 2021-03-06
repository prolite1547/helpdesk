import {elements,elementStrings} from "./base";


export const generateExpirationInputMarkup = (category) => {

    let date;
    switch (category) {
        case 'hardware':
            date = moment().add(3,'days').format('YYYY-MM-DD HH:mm:ss');
            break;
        case 'software':
            date = moment().add(7,'days').format('YYYY-MM-DD HH:mm:ss');
            break;
        default:
            date = moment().format();
    }

    return `<input name="expiration" value="${date}" hidden>`;
};


export const showContactFormGroup = () => {
    elements.contactFormGroup.classList.remove('u-display-n');

};

export const hideContactFormGroup = () => {
    elements.contactFormGroup.classList.add('u-display-n');
};

