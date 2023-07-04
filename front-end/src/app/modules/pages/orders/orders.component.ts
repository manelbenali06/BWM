import { Component, OnInit } from '@angular/core';
import { OrderService } from 'src/app/core/http/order/order.service';
import { Order } from 'src/app/shared/interfaces/models/order';
@Component({
  selector: 'app-orders',
  templateUrl: './orders.component.html',
  styleUrls: ['./orders.component.css']
})
export class OrdersComponent implements OnInit{
orders: Order[] = [];
constructor(private orderService:OrderService){
  // Récupérer les catégories du service et mettre à jour le tableau des categories
}
ngOnInit(): void{
  this.orderService.getOrder().subscribe(apiOrderResponse => {
    this.orders = apiOrderResponse["hydra:member"];
  });
  console.log(this.orders);
}
}
