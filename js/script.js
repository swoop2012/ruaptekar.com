$(function(){
    $('.product .buy ul li').each(function(){
        var element = $(this);
        var basketLink = element.find('a.basket-link');
        var orderLink = element.find('a.order-link');
        var id = element.data('id');

        basketLink.bind('click',function(e){
            ajaxParams.id = id;
            $.post(basketLink.attr('href'),ajaxParams,function(){
                redrawBasket($('#basketContainer'));
            });
            e.preventDefault();
        });
        orderLink.bind('click',function(e){
            e.preventDefault();
            ajaxParams.id = id;
            $.post(basketLink.attr('href'),ajaxParams,function(){
                location.href=orderLink.attr('href');
            });
        })
    });
});
function redrawBasket(basketContainer){

    if(basketContainer.length)
        $.post('/cart/redraw',ajaxParams,function(data){
            basketContainer.html(data);
        });
}
function scrollWindow()
{
window.scrollTo(0,0)
}

// Корзина
(function($) {
    function Basket(options) {
        this.options = $.extend({
            holder: null,
            productSelector:'.product',
            countSelector:'.basket-box-number span',
            basketContainer:'#basketContainer',
            productPriceSelector:'input.price',
            basketPriceSelector:'.basket-box-price span',
            totalPriceSelector:null,
            countLink:'a.plus,a.minus',
            deleteLink:'.basket-box-del',
            submitLink:null


        }, options);
        if(this.options.holder) {
            this.holder = $(this.options.holder);
            this.totalPrice=0;
            this.product=[];
            this.init();

        }
    }
    Basket.prototype = {
        init: function() {
            this.findElements();
            this.attachEvents();
        },
        findElements: function() {
            var self = this;
            this.products = this.holder.find(this.options.productSelector);
            this.products.each(function(index){
                var productHolder = $(this);
                self.product[index]  = {
                    product: productHolder,
                    countHolder:productHolder.find(self.options.countSelector),
                    productPriceHolder:productHolder.find(self.options.productPriceSelector),
                    basketPriceHolder:productHolder.find(self.options.basketPriceSelector),
                    deleteLink:productHolder.find(self.options.deleteLink),
                    countLink:productHolder.find(self.options.countLink),
                    id:productHolder.data('id')
                };


            });
            if(this.options.totalPriceHolder)
                this.totalPriceHolder = this.holder.find(this.options.totalPriceSelector);
            this.basketContainer = $(this.options.basketContainer);
            if(this.options.submitLink){
                this.submitLink = this.holder.find(this.options.submitLink);
                this.form = this.holder.find('form');
            }

        },
        attachEvents: function() {
            var self=this;
            $.each(self.product,function(index){
               var element = this;

                element.deleteLink.bind('click',function(e){
                   ajaxParams.id = element.id;
                   if(confirm("Вы действительно хотите удалить товар"))
                   {
                       $.post(self.holder.data('del-link'),ajaxParams);
                       e.preventDefault();
                       element.product.remove();
                       self.product.splice(index,1);
                       self.countCart();
                   }
               });

                element.countLink.bind('click',function(e){
                   ajaxParams.id = element.id;
                   var link = $(this);
                   var flag = true;
                   var prodCount = parseInt(element.countHolder.text());

                   ajaxParams.sign=null;
                   if(link.hasClass('plus')){
                       prodCount++;
                       ajaxParams.sign='+';
                   }
                   else if( prodCount > 1){
                       prodCount--;
                       ajaxParams.sign='-';
                   }
                   else flag = false;
                   if(flag){
                       $.post(self.holder.data('link'),ajaxParams);
                       element.countHolder.text(prodCount);
                       self.countCart();
                   }
                   e.preventDefault();
               });
            });
            if(this.options.submitLink)
                this.submitLink.bind('click',function(e){
                    e.preventDefault();
                    self.form.submit();
                });

        },
        countCart:function(){
            var self=this;
            self.totalPrice= 0;
            $.each(self.product,function(){
                var count,price,res;
                count = parseInt(this.countHolder.text());
                price = parseInt(this.productPriceHolder.val());
                if(!isNaN(count)){
                    res = count * price;
                    self.totalPrice +=  res;
                    this.basketPriceHolder.text(res);

                }
            });
            if(self.totalPriceHolder)
                self.totalPriceHolder.text(self.totalPrice+' руб.');
            redrawBasket(self.basketContainer);
        }
    }
    $.fn.basket = function(opt) {
        return this.each(function() {
            new Basket($.extend(opt, {holder: $(this)}));
        });
    };
})(jQuery);
//Заказ
(function($) {
    function OrderProcess(options) {
        this.options = $.extend({
            holder: null,
            product:'.product,.delivery-block,.discount,.promo',
            productDelivery:'delivery-block',
            selectDelivery:'.delivery-payment.b-delivery p',
            radioDelivery:'input:radio',
            radioPayment:'input:radio',
            blocksPayment:'.delivery-payment.b-payment .payment-select',
            selectPayment:'p',
            productTitle:'b.title',
            basketPriceSelector:'.ord-price span',
            totalPriceSelector:'.basket-total span',
            forms:'.tab',
            submitLink:null

        }, options);
        if(this.options.holder) {
            this.holder = $(this.options.holder);
            this.totalPrice = 0;
            this.product = [];
            this.payment = [];
            this.init();
        }
    }
    OrderProcess.prototype = {
        init: function() {
            this.findElements();
            this.blocksPayment.hide();
            this.forms.hide();
            this.attachEvents();
        },
        findElements: function() {
            var self = this;
            this.products = this.holder.find(this.options.product);
            this.products.each(function(index){

                var productHolder = $(this);
                if(productHolder.hasClass(self.options.productDelivery))
                    self.productDeliveryIndex = index;
                self.product[index]  = {
                    product: productHolder,
                    titleHolder:productHolder.find(self.options.productTitle),
                    basketPriceHolder:productHolder.find(self.options.basketPriceSelector)
                };
            });
            this.selectDelivery = this.holder.find(this.options.selectDelivery);
            this.blocksPayment = this.holder.find(this.options.blocksPayment);
            this.blocksPayment.each(function(index){
                var paymentHolder = $(this);
                self.payment[index]  = {
                    payment: paymentHolder,
                    selectPayment:paymentHolder.find(self.options.selectPayment),
                    radioPayment:paymentHolder.find(self.options.radioPayment)
                };
            });
            this.selectPayment = this.blocksPayment.find(this.options.selectPayment);
            this.radioDelivery = this.selectDelivery.find(this.options.radioDelivery);
            this.radioPayment  = this.selectPayment.find(this.options.radioPayment);
            this.totalPriceHolder = this.holder.find(this.options.totalPriceSelector);
            this.forms = this.holder.find(this.options.forms);

            if(this.options.submitLink){
                this.submitLink = this.forms.find(this.options.submitLink);
            }

        },
        attachEvents: function() {
            var self=this;

            $.each(this.selectDelivery,function(index){
                $(this).bind('click',function(){
                    var element = $(this);
                    var i = element.index()-1;
                    var type = parseInt(element.data('type'))-1;
                    if(!element.hasClass('active')){
                        ajaxParams.id = element.data('id');
                        ajaxParams.type = 'delivery';
                        $.post('/order/setParam',ajaxParams);
                        self.selectDelivery.removeClass('active');
                        self.radioDelivery.attr({checked:false});
                        element.addClass('active');
                        self.radioDelivery.eq(i).attr({checked:true});
                        self.blocksPayment.hide();
                        self.selectPayment.removeClass('active');
                        self.radioPayment.attr({checked:false});
                        self.blocksPayment.eq(i).show();
                        self.forms.hide();
                        self.forms.eq(type).show();
                        self.product[self.productDeliveryIndex].titleHolder.text(element.data('name'));
                        self.product[self.productDeliveryIndex].basketPriceHolder.text(element.data('price'));
                        self.countCart();
                    }
                });
            });
            $.each(this.payment,function(index){
                var payment = this;
                payment.selectPayment.bind('click',function(){
                    var element = $(this);
                    var i = element.index()-1;
                    if(!element.hasClass('active')){
                        ajaxParams.id = element.data('id');
                        ajaxParams.type = 'payment';
                        $.post('/order/setParam',ajaxParams);
                        self.selectPayment.removeClass('active');
                        self.radioPayment.attr({checked:false});
                        element.addClass('active');
                        payment.radioPayment.eq(i).attr({checked:true});
                    }
                });
            })
      },
        countCart:function(){
            var self=this;
            self.totalPrice= 0;
            $.each(self.product,function(){
                var price;
                price = parseInt(this.basketPriceHolder.text());
                if(this.product.hasClass('discount'))
                    price *= -1;
                if(!isNaN(price)){
                    self.totalPrice +=  price;
                }
            });
            self.totalPriceHolder.text(self.totalPrice+' руб.');
        }
    }
    $.fn.orderProcess = function(opt) {
        return this.each(function() {
            new OrderProcess($.extend(opt, {holder: $(this)}));
        });
    };
})(jQuery);