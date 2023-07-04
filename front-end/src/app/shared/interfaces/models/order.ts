export interface Order{
  "@id" ?:string; //le typage des variables pour la securité
  id: number;
  reference: string;
  paidAt:Date;
  payment_id:number
  amount:string;
}
