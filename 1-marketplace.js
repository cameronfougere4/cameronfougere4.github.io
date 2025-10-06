
function Cart(){
    this.itemGroups = [];
    this.showTotalAmount = function(){
        if (this.itemGroups.length == 0){
            document.write("<p> You have 0 item, for a total amount of 0$, in your cart! </p>");
        } else  {
            let amount = 0;
            for (let i = 0; i < this.itemGroups.length; i++) {
                let item = this.itemGroups[i];
                amount += item.price * item.quantity;
			} 
			{
			 let tax = amount * 0.10;
            let totalWithTax = amount + tax;
           document.write("<p>You have " + this.itemGroups.length + " item group(s) in your cart.<br>" +
                "Total before tax: $" + amount.toFixed(2) + "<br>" +
                "Total with tax: $" + totalWithTax.toFixed(2) + "</p>");
			}
			
			  this.addItemGroup = function(itemGroup) {
        this.itemGroups.push(itemGroup);
    }
			
        }
    }
}
function ItemGroup(name, price, quantity) {
	this.name = name;
	this.price = price;
	this.quantity = quantity;
}

	

document.write("<h2> 1) Creating the cart </h2>")
let my_cart = new Cart()
my_cart.showTotalAmount();
document.write("<h2> 2) Adding 15 pants at 10.05$ each to the cart! </h2>")
let pants = new ItemGroup("pants", 10.05, 15);
my_cart.addItemGroup(pants)
my_cart.showTotalAmount();
document.write("<h2> 3) Adding 1 coat at 99.99$ to the cart! </h2>")
let coat = new ItemGroup("pants", 99.99, 1);
my_cart.addItemGroup(coat)
my_cart.showTotalAmount();