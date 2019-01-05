#include<iostream>
#include<string.h>
#include<cstdlib>
using namespace std;
struct lnode
{
	int data;
	struct lnode *next;
};
typedef struct lnode *lptr;   //from now lptr is alias of  lnode;
lptr L;                        //i.e  struct lnode *l is declared;
struct queue                   // L is like *start
{
	lptr front;
	lptr rear;
};
struct queue q;
//q.front=L;
void add_end(lptr &L,int k)    // L is like *start
{
	lptr T,H;H=L;
	if(L==NULL)
	{
		L=new(lnode);
		q.front=L;
		L->data=k;
		L->next=NULL;
	}
	else
	{
	while(H->next!=NULL)
	{
		H=H->next;
	}
	T=new(lnode);
	H->next=T;
	T->data=k;
	T->next=NULL;	
    }
}
int del(lptr &L)
{
	int k;
		if(L==NULL)
		{
			cout<<"no elements present";
			return -1;
		}
		else
		{
			k=L->data;
		if(q.front==q.rear)
		{
			q.front=NULL;
			q.rear=NULL;
			return k;
		}
		 else
		 {
		 //lptr H;H=L;
		 L=L->next;
		 return k;
        }
      }
}
void enque(queue &q,int k)
{
	add_end(q.rear,k);
}
void deque(queue &q)
{
	int g;
	//cout<<"not yet";
	L=q.front;
	g=del(L);
	cout<<"element deleted is"<<g;
	//cout<<"yep";
}
int main()
{
	int choice,k,y;
	do
	{
	cout<<"enter the choice";
	cout<<"1:enque,2:deque";
	cin>>choice;
	switch(choice)
	{
		case 1:
			cout<<"enter the element to be entered";
			cin>>k;
			enque(q,k);
			break;
		case 2:
			deque(q);
			break;
	}
    cout<<"do u wanna continue";
    cout<<"1:yes 2:no" ;
	cin>>y;
    }while(y!=0);
    return 0;
}


