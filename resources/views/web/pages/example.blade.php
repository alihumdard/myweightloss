{{-- response in json --}}

{
    "items": [
      {
        "orderReference": null,
        "recipient": {
          "address": {
            "fullName": "John Doe",
            "companyName": "ABC Inc.",
            "addressLine1": "123 Main St",
            "addressLine2": null,
            "addressLine3": null,
            "city": "London",
            "county": "Greater London",
            "postcode": "SW1A 1AA",
            "countryCode": "GB"
          },
          "phoneNumber": "1234567890",
          "emailAddress": "john.doe@example.com",
          "addressBookReference": null
        },
        "sender": {
          "tradingName": null,
          "phoneNumber": null,
          "emailAddress": null
        },
        "billing": {
          "address": {
            "fullName": "Jane Smith",
            "companyName": "XYZ Ltd.",
            "addressLine1": "456 High St",
            "addressLine2": null,
            "addressLine3": null,
            "city": "Manchester",
            "county": "Greater Manchester",
            "postcode": "M1 1AB",
            "countryCode": "GB"
          },
          "phoneNumber": "9876543210",
          "emailAddress": "jane.smith@example.com"
        },
        "packages": [
          {
            "weightInGrams": 200,
            "packageFormatIdentifier": "parcel",
            "customPackageFormatIdentifier": "",
            "dimensions": {
              "heightInMms": 10,
              "widthInMms": 20,
              "depthInMms": 30
            },
            "contents": [
              {
                "name": "Product A",
                "SKU": "SKU001",
                "quantity": 1,
                "unitValue": 999,
                "unitWeightInGrams": 200,
                "customsDescription": "Product A",
                "extendedCustomsDescription": "Product A Description",
                "customsCode": "123456",
                "originCountryCode": "GB",
                "customsDeclarationCategory": null,
                "requiresExportLicence": null,
                "stockLocation": null
              }
            ]
          }
        ],
        "orderDate": "2024-03-07T14:15:22Z",
        "plannedDespatchDate": null,
        "specialInstructions": "Handle with care",
        "subtotal": 999,
        "shippingCostCharged": 100,
        "otherCosts": 50,
        "customsDutyCosts": null,
        "total": 1169.50,
        "currencyCode": "GBP",
        "postageDetails": {
          "sendNotificationsTo": "sender",
          "serviceCode": null,
          "serviceRegisterCode": null,
          "consequentialLoss": 0,
          "receiveEmailNotification": null,
          "receiveSmsNotification": null,
          "guaranteedSaturdayDelivery": null,
          "requestSignatureUponDelivery": null,
          "isLocalCollect": null,
          "safePlace": null,
          "department": null,
          "AIRNumber": null,
          "IOSSNumber": null,
          "requiresExportLicense": null,
          "commercialInvoiceNumber": null,
          "commercialInvoiceDate": null
        },
        "tags": [
          {
            "key": "laptopn",
            "value": "laptop"
          }
        ],
        "label": {
          "includeLabelInResponse": true,
          "includeCN": null,
          "includeReturnsLabel": null
        },
        "orderTax": 170.50
      }
    ]
  }