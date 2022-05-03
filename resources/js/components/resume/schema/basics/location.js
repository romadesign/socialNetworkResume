export default {
    fields: [
      // Address
      {
        type: 'input',
        inputType: 'text',
        placeholder: '2712 Broadway St',
        label: 'Address',
        model: 'address',
        styleClasses: ['col-12','col-md-4'],
      },
      // Postal Code
      {
        type: 'input',
        inputType: 'text',
        placeholder: 'CA 94115',
        label: 'Postal Code',
        model: 'postalCode',
        styleClasses: ['col-12','col-md-4'],
      },
      // City
      {
        type: 'input',
        inputType: 'text',
        placeholder: 'San Francisco',
        label: 'City',
        model: 'city',
        styleClasses: ['col-12','col-md-4'],
      },
      // Country Code
      {
        type: 'input',
        inputType: 'text',
        placeholder: 'US',
        label: 'Country Code',
        model: 'countryCode',
        styleClasses: ['col-12','col-md-6'],
      },
      // Region
      {
        type: 'input',
        inputType: 'text',
        placeholder: 'California',
        label: 'Region',
        model: 'region',
        styleClasses: ['col-12','col-md-6'],
      },
    ],
  };