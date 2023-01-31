<!DOCTYPE html>
<html>
<head>
  <title>Admin Page for Cloth Ecommerce Web App</title>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Orders</a></li>
        <li><a href="#">Customers</a></li>
        <li><a href="#">Reports</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section>
      <h2>Add Product</h2>
      <form action="#" method="post">
        <div>
          <label for="product-name">Product Name:</label>
          <input type="text" id="product-name" name="product-name">
        </div>
        <div>
          <label for="product-description">Product Description:</label>
          <textarea id="product-description" name="product-description"></textarea>
        </div>
        <div>
          <label for="product-category">Product Category:</label>
          <select id="product-category" name="product-category">
            <option value="">Select Category</option>
            <option value="1">Shirts</option>
            <option value="2">Pants</option>
            <option value="3">Jackets</option>
          </select>
        </div>
        <div>
          <label for="product-price">Product Price:</label>
          <input type="text" id="product-price" name="product-price">
        </div>
        <div>
          <label for="product-image">Product Image:</label>
          <input type="file" id="product-image" name="product-image">
        </div>
        <div>
          <input type="submit" value="Add Product">
        </div>
      </form>
    </section>
    <section>
      <h2>Manage Products</h2>
      <table>
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Category</th>
            <th>Product Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Product 1</td>
            <td>This is a description of product 1</td>
            <td>Shirts</td>
            <td>$50</td>
            <td>
              <a href="#">Edit</a>
              <a href="#">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
  <footer>
