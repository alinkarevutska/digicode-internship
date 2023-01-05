
// ----- filling tabs with content -----
const getTabsArray = () => {
    let tabsArray = [
        {
        "tab" : "Pizza",
        "header": "Margherita",
        "price": 12.50,
        "ingredients": "Fresh tomatoes, fresh mozarella, fresh basil",
        "additionalInfo": "",
        },
        {
        "tab" : "Pizza",
        "header": "Formaggio",
        "price": 15.50,
        "ingredients": "Four cheeses (mozarella, parmesan, recorgino, jarlsberg)",
        "additionalInfo": "",
        },
        {
        "tab" : "Pizza",
        "header": "Chicken",
        "price": 15.00,
        "ingredients": "Fresh tomatoes, mozarella, chicken, onions",
        "additionalInfo": "",
        },
        {
        "tab" : "Pizza",
        "header": "Pineapple o'clock",
        "price": 16.50,
        "ingredients": "Fresh tomatoes, mozarella, fresh pineapple, bacon, fresn basil",
        "additionalInfo": "",
        },
        {
        "tab" : "Pizza",
        "header": "Meat town",
        "price": 20.00,
        "ingredients": "Fresh tomatoes, mozarella, hot pepporoni, hot sausage, beef, chicken",
        "additionalInfo": "is-hot",
        },
        {
        "tab" : "Pizza",
        "header": "Parma",
        "price": 14.50,
        "ingredients": "Fresh tomatoes, mozarella, parma, bacon, fresh arugula",
        "additionalInfo": "is-new",
        },
    
    
        {
        "tab" : "Salads",
        "header": "Lasagna",
        "price": 13.50,
        "ingredients": "Chickpeas, avocado, cranberries, pepitas",
        "additionalInfo": "",
        },
        {
        "tab" : "Salads",
        "header": "Spaghetti classica",
        "price": 11.00,
        "ingredients": "Fresh tomatoes, onions, ground beef",
        "additionalInfo": "is-hot",
        },
        {
        "tab" : "Salads",
        "header": "Caesar salad",
        "price": 12.00,
        "ingredients": "Grilled chicken, lettuce, croutons, eggs, parmesan cheese",
        "additionalInfo": "",
        },
        {
        "tab" : "Salads",
        "header": "Italian salad",
        "price": 9.50,
        "ingredients": "Crisp lettice, tomatoes, red pepper, onion, olives",
        "additionalInfo": "",
        },
        {
        "tab" : "Salads",
        "header": "Greek salad",
        "price": 7.50,
        "ingredients": "Tomatoes, cucumber, olives, feta cheese",
        "additionalInfo": "",
        },
        {
        "tab" : "Salads",
        "header": "Kale salad",
        "price": 8.50,
        "ingredients": "Chickpeas, avocado, cranberries, pepitas",
        "additionalInfo": "is-new",
        },
            
        
        {
        "tab" : "Starters",
        "header": "Today's soup",
        "price": 5.50,
        "ingredients": "Ask the waiter",
        "additionalInfo": "is-seasonal",
        },
        {
        "tab" : "Starters",
        "header": "Bruchetta",
        "price": 4.00,
        "ingredients": "Chopped tomatoes, basil, chicken, garlic",
        "additionalInfo": "",
        },
        {
        "tab" : "Starters",
        "header": "Fresh rolls",
        "price": 5.50,
        "ingredients": "Prawns, carrot, cabbage, spring onions",
        "additionalInfo": "is-new",
        },
        {
        "tab" : "Starters",
        "header": "Ravioli",
        "price": 12.50,
        "ingredients": "Ravioli filled with cheese",
        "additionalInfo": ""
        },
        {
        "tab" : "Starters",
        "header": "Seafood pasta",
        "price": 25.50,
        "ingredients": "Salmon, shrimp, lobster, garlic",
        "additionalInfo": "is-popular"
        },
        {
        "tab" : "Starters",
        "header": "Grilled vegetables",
        "price": 6.50,
        "ingredients": "Aubergine, tomatoes, red/yellow pepper, mushrooms",
        "additionalInfo": ""
        },
    ];

    return tabsArray;
} 

const renderTabs = ( tabItem ) => {
    let tabContent = document.createElement( 'div' );
    tabContent.className = 'tab-row';

    let additionalInfo = tabItem.additionalInfo ? 
        `<span class="${tabItem.additionalInfo}"</span>` : 
        '';
    
    tabContent.innerHTML = `
        <div class="tab-row-main-info">
        <h3 class="tab-row-header">${tabItem.header}</h3>
        ${additionalInfo}
        <span class="tab-row-price">$${tabItem.price.toFixed(2)}</span>
        </div>
        <p>${tabItem.ingredients}</p>
        </div>
    `;
    return tabContent;
};

const fillTheTabs = () => {
    let tabsArray = getTabsArray();
    tabsArray.forEach( item => {
       let tabsCategory = document.getElementById( `${item.tab}` );
       tabsCategory.append( renderTabs( item ) );
    });
};

fillTheTabs();

// ----- changing tabs content -----

const detectActiveTab = () => {
    let openedMenu = document.getElementById('Pizza');
    let activatedBtn = document.querySelector('.tablinks.pizza');
    openedMenu.style.display = 'block';
    activatedBtn.classList.add( 'active' );
}

detectActiveTab();

const openMenu = ( event, menuItem ) =>  {

    // Get all elements with class="tabcontent" and hide them
    let tabcontent = document.getElementsByClassName( "tabcontent" );
    for ( let i = 0; i < tabcontent.length; i++ ) {
        tabcontent[i].style.display = "none";
    };

    // Get all elements with class="tablinks" and remove the class "active"
    let tablinks = document.getElementsByClassName( "tablinks" );
    for ( let i = 0; i < tablinks.length; i++ ) {
        tablinks[i].className = tablinks[i].className.replace( " active", "" );
    };

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById( menuItem ).style.display = "block";
    event.target.className += " active";
}

// ----- establishing min date for input -----
const suggestInputDate = () => {
    let dateChooseInput = document.querySelector( 'input[type="datetime-local"]' );
    let now = new Date().toISOString().substring(0, 16);
    dateChooseInput.min = now;
}

suggestInputDate();
