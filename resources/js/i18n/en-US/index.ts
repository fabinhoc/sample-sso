export default {
  dashboard: "Dashboard",
  user: "User | Users",
  role: "Role | Roles",
  page: {
    users: {
      new: "New user",
    },
    roles: {
      new: "New role",
    },
  },
  components: {
    users: {
      usersTable: {
        name: "Name",
        email: "Email",
        emailVerifiedAt: "Email verified",
        confirmed: "Confirmed",
        unconfirmed: "Unconfirmed",
        actions: "Actions",
      },
      gridFilters: {
        confirmed: "Confirmed",
        unconfirmed: "Unconfirmed",
        name: "Name",
        email: "Email",
      },
    },
    roles: {
      rolesTable: {
        name: "Name",
        actions: "Actions",
        application: "App",
      },
      gridFilters: {
        name: "Name",
        application: "App",
      },
    },
  },

  test: "test",
  yes: "Yes",
  no: "No",
  industry: "Industry | Industries",
  entryData: "Entry Data",
  product: "Product | Products",
  contract: "Contract | Contracts",
  price: "Price | Prices",
  order: "Order | Orders",
  logout: "Logout",
  emptyData: "There is no data to display",
  previous: "Previous",
  next: "Next",
  file: "File | Files",
  status: "Status",
  createdAt: "Created at",
  updatedAt: "Updated at",
  action: "Action | Actions",
  welcome: "Welcome",
  english: "English",
  portuguese: "Portuguese (BR)",
  redirecting: "Redirecting...",
  invalidRequest: "Invalid request",
  authenticationFailed: "Authentication Failed",
  filter: "Filter | Filters",
  wholesalerBranch: "Wholesaler branch code| Wholesaler branch codes",
  wholesaler: "Wholesaler code | Wholesaler codes",
  market: "Market",
  views: {
    login: {
      welcomeMessage: "Welcome to SAP Integration Admin",
      ssoRequired: "You need to login with SSO to access the system.",
      buttonSSO: "Click here to login",
    },
    entryData: {
      indexView: {
        title: "Entry Data",
      },
      detailView: {
        title: "Entry Data - {id}",
      },
    },
    products: {
      indexView: {
        title: "Product | Products",
      },
    },
    contracts: {
      indexView: {
        title: "Contract | Contracts",
      },
    },
    prices: {
      indexView: {
        title: "Price | Prices",
      },
    },
    orders: {
      indexView: {
        title: "Order | Orders",
      },
    },
  },
  signIn: "Sign in",
  validations: {
    required: "This field is required",
    string: "This field must not be a numeric value",
    number: "This field must be numeric",
    email: "This field must be a valid e-mail",
    minLength: {
      number: "This field must be greater than {minLength}",
      string: "This field must have at least {minLength} characters",
    },
    passwordConfirmation: "Password and Password Confirmation does not match",
    date: "Invalid date",
    endDateLessThanStartDate:
      "{endDate} must be greater or equal than {startDate}",
  },
  formEntryDataFilter: {
    startDate: "Start date",
    endDate: "End date",
    idocNumber: "Idoc number",
    materialNumber: "Material number",
    industry: "Industry",
    filter: "Filter",
    clear: "Clear",
  },
  formProductFilter: {
    startDate: "Start date",
    endDate: "End date",
    materialNumber: "Material number",
    industry: "Industry",
    filter: "Filter",
    clear: "Clear",
    productData: "Product Data",
    data: {
      _id: "ID",
      active: "Active",
      businessUnit: "Business Unit",
      curve: "Curve",
      description: "Description",
      division: "Division",
      ean: "EAN",
      family: "Family",
      monitored: "Monitored",
      productMarket: "Product Market",
      shortName: "Short Name",
      standartPrice: "Standard Price",
    },
  },
  formContractFilter: {
    startDate: "Start date",
    endDate: "End date",
    industry: "Industry",
    filter: "Filter",
    clear: "Clear",
    contractData: "Contract data",
    data: {
      _id: "ID",
      deletionFlag: "Deletion flag",
      discount: "Discount",
      ean: "EAN",
      validFrom: "Valid from",
      validTo: "Valid to",
      startDate: "Start date",
      endDate: "End date",
    },
  },
  formPriceFilter: {
    startDate: "Start date",
    endDate: "End date",
    industry: "Industry",
    filter: "Filter",
    clear: "Clear",
    priceData: "Price data",
    data: {
      _id: "ID",
      ean: "EAN",
      region: "Region",
      price: "Price",
      validFrom: "Valid From",
      validTo: "Valid To",
      startDate: "Start date",
      endDate: "End date",
    },
  },
  formOrderFilter: {
    startDate: "Start date",
    endDate: "End date",
    industry: "Industry code",
    filter: "Filter",
    clear: "Clear",
    market: "Market",
    status: "status",
    wholesaler: "Wholesaler code",
    product: "Product code",
  },
};
