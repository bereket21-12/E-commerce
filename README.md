# E-commerce
---
## Contents
***
### List of Figures

- **Home Page**
  - *Navigation Bar*
  - *Contact us Page*
  - *About us Page*
- **Clothing Page (PRODUCTS)**
- **Order us Page**
  - *PayPal For Payment*
- **Register**
  - *Login Page*
  - *SignUp Page*
- **Admin Page**
- **Order view For User**

***

## DEADLINE 19-04-2015

---

-----Database design--------
 
---
 # Database Name : E-commerce
 # Tables :
    1:user
       1.1 : role	
       1.2 :customer_id
       1.3 :name	
       1.4 :email
       1.5 :address
       1.5 :phone_number
       1.6 :password	
    2: product
       2.1 :product_id
       2.2 :product_name
       2.3 :product_description
       2.4 :price
       2.5 :image_url	
       2.6 :category_id	
    3: order
      3.1 :order_id
      3.2 :customer_id
      3.3 :total_price
      3.4 :shipping_address	
      3.5 :order_date
    4: catarory
      4.1 :category_name
      4.2 :category_id
    5 :inventory
      5.1 :product_id
      5.2 :quantity
    6 :review
     6.1 :review_id
     6.2 :product_id
     6.3 :customer_id
     6.4 :rating	
     6.5 :review_text
    
    

