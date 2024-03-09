import React, { useState, useEffect } from 'react';
import Store from './components/store'
import Navbar from './components/navbar'
import axios from 'axios';
import './App.css';

const App = () => {
  const [products, setProducts] = useState([]);
  const [productCart, setProductCart] = useState([]); 
  const [newProductCart, setNewProductCart] = useState([]);
  const [isLoading, setIsLoading] = useState(false);


  const sellixApiKey = process.env.REACT_APP_SELLIX_API_KEY;

  useEffect(() => {
    const fetchSellixProducts = async () => {
      try {
        const response = await axios.get('https://dev.sellix.io/v1/products', {
          headers: {
            'Authorization': `Bearer ${sellixApiKey}`
          }
        });

        console.log(response.data.data.products);

        // Transform the products array into the productCart format
        const productsList = await response.data.data.products.map(product => ({
          uniqid: product.uniqid,
          unit_quantity: 0,
          title: product.title,
          imgId: product.cloudflare_image_id
        }));
        setProducts(response.data.data.products);
        setProductCart(productsList);
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    };
    fetchSellixProducts();
  }, [sellixApiKey]);


  const updateCart = (id) => {

    const updatedProductCart = productCart.map(product => {
        if (product.uniqid === id && product.unit_quantity < 10) {
            return { ...product, unit_quantity: product.unit_quantity + 1 };
        } else if (product.uniqid === id && product.unit_quantity >= 10) {
          alert(`Exceeding limit allowed to purchase selected key!`)
        }
        return product;
    });
    
    const updatedNewProductCart = updatedProductCart.filter(product => product.unit_quantity !== 0);

    setProductCart(updatedProductCart)
    setNewProductCart(updatedNewProductCart);
};

console.log(productCart);


  const handlePurchase = async () => {
    setIsLoading(true);
    try {
      const response = await axios.post('https://dev.sellix.io/v1/payments', {
        product_id: null,
        cart: {
          products: newProductCart
        },
        currency: "USD",
        email: "test@gmail.com",
        return_url: "/"
      }, {
        headers: {
          'Authorization': `Bearer ${sellixApiKey}`
        }
      });
      const paymentUrl = response.data.data.url;
      console.log(paymentUrl);
      window.location.href = paymentUrl;
    } catch (error) {
      console.error('Error creating payment:', error);
      // Handle error
    }

    setIsLoading(false);
  };

  return (
    <div>
      <Navbar cartInfo={newProductCart} handlePurchase={handlePurchase} isLoading={isLoading}/>
      <Store updateCart={updateCart} products={products} productInfo={productCart}/>

    </div>
  );
};

export default App;
