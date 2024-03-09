import React, { useState, useEffect } from 'react';
import axios from 'axios';
import '../App.css';


import apex from '../images/apex.jpg'
import dayz from '../images/dayz.jpg'
import valorant from '../images/valorant.jpg'
import rust from '../images/rust.jpg'

const Store = ({updateCart}) => {


  const getImageSrc = (slug) => {
    switch (slug) {
      case 'apex':
        return apex;
      case 'dayz':
        return dayz;
      case 'valorant':
        return valorant;
      case 'rust':
        return rust;
      default:
        return null; // Return a default image or handle missing images
    }
  };

  const products = [
    {
      slug: "apex",
      title: "Apex Legends",
      day: "65e1e7397f26f",
      week: "65ec0d8fe9917",
      month: "65ec1024d1903",
    },
    {
      slug: "rust",
      title: "Rust",
      day: "65e2117179d32",
      week: "65ec104862273",
      month: "65ec105004b44",
    }
  ]




  return (
    <div className="store">
      <div className="products">
        {products.map((product, index) => {
          return (
            <div className='product'>
              <div className='product-image'>
                <img src={getImageSrc(product.slug)} alt={`${product.slug} logo`} />
              </div>
              <p>{product.title} Cheat</p>
              <div className='purchase'>
                <button onClick={() => updateCart(product.day)} className='variant'>Day</button>
                <button onClick={() => updateCart(product.week)} className='variant'>Week</button>
                <button onClick={() => updateCart(product.month)} className='variant'>Month</button>
              </div>
            </div>
          )
        })}
      </div>
    </div>
  );
};

export default Store;
