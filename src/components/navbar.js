import React, { useState} from 'react';
import '../App.css';


const Navbar = ({cartInfo, handlePurchase, isLoading}) => {
  const [open, setOpen] = useState(false);
  console.log(cartInfo.length);

    let total = 0;
    cartInfo.forEach(item => {
      total += item.unit_quantity;
    });




  return (
    <nav>
      <h1>Sellix Store Example</h1>
      <div onClick={() => setOpen(!open)} className='cart'>
        <div className='cart-num'>{total}</div>
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24"><path fill="currentColor" d="M7 22q-.825 0-1.412-.587T5 20q0-.825.588-1.412T7 18q.825 0 1.413.588T9 20q0 .825-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20q0-.825.588-1.412T17 18q.825 0 1.413.588T19 20q0 .825-.587 1.413T17 22M5.2 4h14.75q.575 0 .875.513t.025 1.037l-3.55 6.4q-.275.5-.737.775T15.55 13H8.1L7 15h11q.425 0 .713.288T19 16q0 .425-.288.713T18 17H7q-1.125 0-1.7-.987t-.05-1.963L6.6 11.6L3 4H2q-.425 0-.712-.288T1 3q0-.425.288-.712T2 2h1.625q.275 0 .525.15t.375.425z"/></svg>
      </div>
      <div className={open ? 'cart-expanded' : "cart-closed"}>
        <h1 className='cart-title'>Checkout products:</h1>
        <div className='cart-items'>
          {cartInfo.map((item) => {
              return (
                <div className='cart-item'>
                  <img src={`https://imagedelivery.net/95QNzrEeP7RU5l5WdbyrKw/${item.imgId}/public`} alt={item.title} />
                  <h1>{item.title} Key</h1>
                  <p>{item.unit_quantity}</p>
                </div>
              ) 
          })}
        </div>
        {cartInfo.length >= 1 ? (
          isLoading ? (
          <button className='loading'>Loading...</button>
          ) : (
            <button className='checkout' onClick={() => handlePurchase()}>Checkout</button>
          )
        ) : (
          <p className='empty'>Your cart is empty!</p>
        )}


      </div>
      
    </nav>
  );
};

export default Navbar;
